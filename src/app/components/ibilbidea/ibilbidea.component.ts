import { Component } from '@angular/core';

@Component({
  selector: 'app-ibilbidea',
  templateUrl: './ibilbidea.component.html',
  styleUrls: ['./ibilbidea.component.scss']
})
export class IbilbideaComponent {
  events = [
    {
      date: '16:00 - 22:30',
      title: 'Ibilbide 4',
      description: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima deleniti, rerum ducimus assumenda optio nulla, quia obcaecati velit incidunt eum nisi odio officia itaque nam ea repellendus consequatur, voluptatum suscipit.'
    },
    {
      date: '5:15 - 13:25',
      title: 'Ibilbide 3',
      description: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima deleniti, rerum ducimus assumenda optio nulla, quia obcaecati velit incidunt eum nisi odio officia itaque nam ea repellendus consequatur, voluptatum suscipit.'
    },
    {
      date: '14:30 - 17:30',
      title: 'Ibilbide 2',
      description: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima deleniti, rerum ducimus assumenda optio nulla, quia obcaecati velit incidunt eum nisi odio officia itaque nam ea repellendus consequatur, voluptatum suscipit.'
    },
    {
      date: '5:00 - 12:00',
      title: 'Ibilbide 1',
      description: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima deleniti, rerum ducimus assumenda optio nulla, quia obcaecati velit incidunt eum nisi odio officia itaque nam ea repellendus consequatur, voluptatum suscipit.'
    },
  ];
}
