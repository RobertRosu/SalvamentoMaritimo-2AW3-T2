import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NorGaraComponent } from './nor-gara.component';

describe('NorGaraComponent', () => {
  let component: NorGaraComponent;
  let fixture: ComponentFixture<NorGaraComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [NorGaraComponent]
    });
    fixture = TestBed.createComponent(NorGaraComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
