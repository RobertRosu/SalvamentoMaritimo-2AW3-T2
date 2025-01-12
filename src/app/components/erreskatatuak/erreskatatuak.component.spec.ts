import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ErreskatatuakComponent } from './erreskatatuak.component';

describe('ErreskatatuakComponent', () => {
  let component: ErreskatatuakComponent;
  let fixture: ComponentFixture<ErreskatatuakComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ErreskatatuakComponent]
    });
    fixture = TestBed.createComponent(ErreskatatuakComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
