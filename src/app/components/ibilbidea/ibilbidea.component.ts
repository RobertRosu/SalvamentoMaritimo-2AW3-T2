import { Component } from '@angular/core';

@Component({
  selector: 'app-ibilbidea',
  templateUrl: './ibilbidea.component.html',
  styleUrls: ['./ibilbidea.component.scss']
})
export class IbilbideaComponent {
  events = [
    {
      date: 'fsg',
      title: 'Ibilbide 4',
      description: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima deleniti, rerum ducimus assumenda optio nulla, quia obcaecati velit incidunt eum nisi odio officia itaque nam ea repellendus consequatur, voluptatum suscipit.'
    },
    {
      date: 'dfgdg',
      title: 'Ibilbide 3',
      description: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima deleniti, rerum ducimus assumenda optio nulla, quia obcaecati velit incidunt eum nisi odio officia itaque nam ea repellendus consequatur, voluptatum suscipit.'
    },
    {
      date: '2:30 - 4:00pm',
      title: 'Ibilbide 2',
      description: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima deleniti, rerum ducimus assumenda optio nulla, quia obcaecati velit incidunt eum nisi odio officia itaque nam ea repellendus consequatur, voluptatum suscipit.'
    },
    {
      date: '5:00 - 8:00pm',
      title: 'Ibilbide 1',
      description: 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima deleniti, rerum ducimus assumenda optio nulla, quia obcaecati velit incidunt eum nisi odio officia itaque nam ea repellendus consequatur, voluptatum suscipit.'
    }
  ];
}
