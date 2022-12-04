import { Component, Input, OnInit } from '@angular/core';
import { DomSanitizer, SafeHtml } from '@angular/platform-browser';
import { Router } from '@angular/router';
import { IngredientService } from '../services/ingredient.service';
import { ShareIngredientsService } from '../services/share-ingredients.service';

@Component({
  selector: 'app-recipes',
  templateUrl: './recipes.component.html',
  styleUrls: ['./recipes.component.css']
})
export class RecipesComponent implements OnInit {

  recipes: any;
  ingrArr: string[]=[];
  title: string='';
  summary: SafeHtml='';
  img: string='';
  prep_time: string='';
  servings: string='';
  sourceUrl: string='';
  constructor(private router: Router, private ingredient: IngredientService, private shared: ShareIngredientsService, private sanitizer: DomSanitizer) { }

  @Input() recipeArr: string[] = [];

  ngOnInit(): void {
    console.log(this.ingrArr)
    this.shared.ingrArr.subscribe(ingrArr => this.ingrArr = JSON.parse(JSON.stringify(ingrArr)))
    this.getRecipes(this.ingrArr)
  }

  getRecipes(ingredients: string[]) { 
    console.log(ingredients);
    this.ingredient.getRecipes(ingredients).subscribe(res => {
      const body = JSON.parse(JSON.stringify(res));
      // console.log(body);
      if(body.status == true) { 
        this.recipes=body.data;
        this.title = body.data.title;
        this.summary = this.sanitizer.bypassSecurityTrustHtml(body.data.summary);
        this.img = body.data.image;
        this.prep_time = body.data.readyInMinutes;
        this.servings = body.data.servings;
        this.sourceUrl = body.data.sourceUrl
        console.log(this.recipes);
      } else { 
        console.log(body.data);
      }
    })
  }

  visit(id: string) { 
    this.router.navigate(['recipe', id]);
  }

}
