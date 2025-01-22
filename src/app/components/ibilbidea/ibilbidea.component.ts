import { Component, OnInit, AfterViewInit, HostListener } from '@angular/core';
import { ApiService } from '../../services/api.service';

@Component({
  selector: 'app-ibilbidea',
  templateUrl: './ibilbidea.component.html',
  styleUrls: ['./ibilbidea.component.scss']
})
export class IbilbideaComponent implements OnInit, AfterViewInit {

    data: any[] = [];
    events: any[] = [];

    private path: SVGPathElement | null = null;
    private totalLength: number = 0;
  
    constructor(private apiService: ApiService) { }
  
    ngOnInit(): void {
      this.apiService.getTravels().subscribe({
        next: (response) => {
          this.data = response.response;
          if (Array.isArray(this.data)) {
            this.data.forEach(element => {
              this.events.push({
                date: element.start_date,
                origen: element.origen,
                destino: element.destino,
                description: element.description
              });
            });
          } else {
            console.error('Response is not an array:', response);
          }
        },
        error: (err) => {
          console.error(err);
        }
      });

      // Usa "as SVGPathElement" para especificar el tipo del elemento
      const pathElement = document.getElementById('timeline-path');

      if (pathElement instanceof SVGPathElement) {
        this.path = pathElement;
        this.totalLength = this.path.getTotalLength();
      } else {
        console.error('El elemento con ID "timeline-path" no es un SVGPathElement.');
      }
    }

    ngAfterViewInit(): void {
      // Calcula la posición inicial del barco después de que el DOM esté listo
      this.setInitialPosition();
    }
  
    @HostListener('window:scroll', ['$event'])
    onScroll(): void {
      this.updateShipPosition();
    }

    setInitialPosition(): void {
      if (this.path) {
        const point = this.path.getPointAtLength(0); // Posición inicial en el path
  
        // Obtener dimensiones del SVG y escalar las coordenadas
        const svg = document.getElementById('timeline-svg');

        if (svg instanceof SVGSVGElement) {
          const svgRect = svg.getBoundingClientRect();
          const scaleX = svgRect.width / svg.viewBox.baseVal.width;
          const scaleY = svgRect.height / svg.viewBox.baseVal.height;
  
          // Coordenadas escaladas
          const x = point.x * scaleX + svgRect.left;
          const y = point.y * scaleY + svgRect.top;
          
  
          // Posicionar el barco en el punto inicial
          const ship = document.getElementById('ship') as HTMLElement;
          if (ship) {
            const shipHeight = ship.offsetHeight;
            const adjustedY = y - shipHeight / 2; // Centrar el barco en la línea
            ship.style.transform = `translate(${x}px, ${adjustedY}px) rotate(-31deg)`;
          }
        }
      }
    }

    updateShipPosition(): void {
      if (this.path) {
        const scrollTop = window.scrollY || document.documentElement.scrollTop;
        const maxScroll = document.documentElement.scrollHeight - window.innerHeight;

        const scrollRatio = scrollTop / maxScroll;
        const currentLength = scrollRatio * this.totalLength;
        const point = this.path.getPointAtLength(currentLength);
        const delta = 1;
        const pointAhead = this.path.getPointAtLength(currentLength + delta);
        const angle = Math.atan2(pointAhead.y - point.y, pointAhead.x - point.x) * (180 / Math.PI);

        const svg = document.getElementById('timeline-svg');

        if (svg instanceof SVGSVGElement) {
          const svgRect = svg.getBoundingClientRect();
          const scaleX = svgRect.width / svg.viewBox.baseVal.width;
          const scaleY = svgRect.height / svg.viewBox.baseVal.height;

          const x = point.x * scaleX + svgRect.left;
          const y = point.y * scaleY + svgRect.top;

          const ship = document.getElementById('ship') as HTMLElement;
          if (ship) {
            const shipHeight = ship.offsetHeight; // Altura real del barco
            const adjustedY = y - shipHeight / 2; // Ajustar para centrar verticalmente
            ship.style.transform = `translate(${x}px, ${adjustedY}px) rotate(${angle}deg)`;
          }
        } else {
          console.error('El elemento con ID "timeline-svg" no es un SVGSVGElement.');
        }
      }
    }
}
