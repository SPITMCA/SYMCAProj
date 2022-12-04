import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ShareIngredientsService {

  private ingredientSource = new BehaviorSubject(['']); // set default status
  ingrArr = this.ingredientSource.asObservable();

  constructor() { }

  getSelectedIngredients(ingrArr: string[]) {
    this.ingredientSource.next(ingrArr)
  }
  
}
