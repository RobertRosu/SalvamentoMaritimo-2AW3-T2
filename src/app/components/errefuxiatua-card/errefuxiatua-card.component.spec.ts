import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ErrefuxiatuaCardComponent } from './errefuxiatua-card.component';

describe('ErrefuxiatuaCardComponent', () => {
  let component: ErrefuxiatuaCardComponent;
  let fixture: ComponentFixture<ErrefuxiatuaCardComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ErrefuxiatuaCardComponent]
    });
    fixture = TestBed.createComponent(ErrefuxiatuaCardComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
