import { Component, OnInit } from '@angular/core';
import { DomSanitizer, SafeHtml } from '@angular/platform-browser';
import { ActivatedRoute } from '@angular/router';
import { RecipeService } from '../services/recipe.service';
import { RouterModule, Router, NavigationEnd } from '@angular/router';
import { FooterComponent } from '../footer/footer.component';

@Component({
  selector: 'app-recipe',
  templateUrl: './recipe.component.html',
  styleUrls: ['./recipe.component.css']
})
export class RecipeComponent implements OnInit {

  hideElement = false;
  

  recipeObj: any;
  imgSrc: string = '';
  instructions: string = '';
  readyInMinutes: string = '';
  sourceUrl: string = '';
  summary: SafeHtml = '';
  title: string = '';
  vegetarian: boolean = false;
  constructor(private route: ActivatedRoute, private sanitizer: DomSanitizer, private recipe: RecipeService,private router: Router) { 
    this.router.events.subscribe((event) => {
      if (event instanceof NavigationEnd) {
        if (event.url === '/login'||event.url === '/register'||event.url === '/recipes'||event.url === '/recipe/:id') {
          this.hideElement = true;
        }  else {
          this.hideElement = false;
        }
      }
    });
  }

  ngOnInit(): void {
    this.route.params.subscribe(params => {
      this.getRecipe(params['id']);
    });
  }

  getRecipe(recipe_id: string) { 
    console.log(recipe_id)
    this.recipe.getOneRecipe(recipe_id).subscribe(res => { 
      const body = JSON.parse(JSON.stringify(res));
      console.log(body);
      if(body.status == true) { 
        this.title = body.data.title;
        this.imgSrc = body.data.image;
        this.summary = this.sanitizer.bypassSecurityTrustHtml(body.data.summary);
        this.sourceUrl = body.data.sourceUrl;
        this.instructions = body.data.instructions;
        this.vegetarian = body.data.vegetarian;
      } else { 
        console.log(body.data);
      }
    })
  }
  
}
