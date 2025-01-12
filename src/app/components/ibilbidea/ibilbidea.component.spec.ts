import { ComponentFixture, TestBed } from '@angular/core/testing';

import { IbilbideaComponent } from './ibilbidea.component';

describe('IbilbideaComponent', () => {
  let component: IbilbideaComponent;
  let fixture: ComponentFixture<IbilbideaComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [IbilbideaComponent]
    });
    fixture = TestBed.createComponent(IbilbideaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
