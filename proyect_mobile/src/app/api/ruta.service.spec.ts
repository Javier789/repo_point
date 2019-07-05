import { TestBed } from '@angular/core/testing';

import { RutaService } from './ruta.service';

describe('RutaService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: RutaService = TestBed.get(RutaService);
    expect(service).toBeTruthy();
  });
});
