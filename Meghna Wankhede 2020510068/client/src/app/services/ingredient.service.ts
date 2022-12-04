import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class IngredientService {

  url: string = 'http://localhost:3000/api/';

  constructor(private http: HttpClient) { }

  getIngredients() { 
    return this.http.get(this.url+'getingredients');
  }

  getRecipes(ingredients: string[]) { 
    return this.http.post(this.url+'getrecipes', {ingredients: ingredients}, {headers: new HttpHeaders({'content-type': 'application/json'})});
  }
}
