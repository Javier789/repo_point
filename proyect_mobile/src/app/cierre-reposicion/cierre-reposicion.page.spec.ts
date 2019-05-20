import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CierreReposicionPage } from './cierre-reposicion.page';

describe('CierreReposicionPage', () => {
  let component: CierreReposicionPage;
  let fixture: ComponentFixture<CierreReposicionPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CierreReposicionPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CierreReposicionPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
