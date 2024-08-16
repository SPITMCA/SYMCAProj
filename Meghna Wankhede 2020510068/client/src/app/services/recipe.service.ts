import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class RecipeService {

  url: string = 'http://localhost:3000/api/';

  constructor(private http: HttpClient) { }

  getOneRecipe(id: string) { 
    return this.http.get(this.url+'getonerecipe/'+id);
  }

}
