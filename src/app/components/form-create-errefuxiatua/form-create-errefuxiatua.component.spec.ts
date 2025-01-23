import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormCreateErrefuxiatuaComponent } from './form-create-errefuxiatua.component';

describe('FormCreateErrefuxiatuaComponent', () => {
  let component: FormCreateErrefuxiatuaComponent;
  let fixture: ComponentFixture<FormCreateErrefuxiatuaComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [FormCreateErrefuxiatuaComponent]
    });
    fixture = TestBed.createComponent(FormCreateErrefuxiatuaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
