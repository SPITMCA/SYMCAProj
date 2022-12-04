import { TestBed } from '@angular/core/testing';

import { ShareIngredientsService } from './share-ingredients.service';

describe('ShareIngredientsService', () => {
  let service: ShareIngredientsService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ShareIngredientsService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
