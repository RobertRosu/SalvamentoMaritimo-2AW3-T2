import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormUpdateErrefuxiatuaComponent } from './form-update-errefuxiatua.component';

describe('FormUpdateErrefuxiatuaComponent', () => {
  let component: FormUpdateErrefuxiatuaComponent;
  let fixture: ComponentFixture<FormUpdateErrefuxiatuaComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [FormUpdateErrefuxiatuaComponent]
    });
    fixture = TestBed.createComponent(FormUpdateErrefuxiatuaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
