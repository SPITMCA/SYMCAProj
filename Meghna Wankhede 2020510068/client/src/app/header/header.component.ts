import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { IngredientService } from '../services/ingredient.service';
import { ShareIngredientsService } from '../services/share-ingredients.service';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

  more1: boolean=false;
  more2: boolean=false;
  more3: boolean=false;
  more4: boolean=false;
  more5: boolean=false;
  more6: boolean=false;
  more7: boolean=false;
  more8: boolean=false;
  vegies: string[] = [];
  herbs: string[] =  [];
  dairies: string[]=[];
  bakings: string[]=[];
  sugars: string[]=[];
  fruits: string[]=[];
  oils: string[]=[];
  substitues: string[]=[];
  selectedVegies: string[] = [];
  selectedHerbs: string[] = [];
  selectedDairies: string[] = [];
  selectedBakings: string[]=[];
  selectedSugars: string[] = [];
  selectedFruits: string[] = [];
  selectedOils: string[] = [];
  selectedSubstitues: string[] = [];
  selectedIngredients: string[]=[];
  data: string = '';
  toggle: boolean = true;
  constructor(private ingredient: IngredientService, private shared: ShareIngredientsService, private router: Router) { }

  ngOnInit(): void {
    // this.vegies = ['garlic', 'onion', 'carrot', 'bell pepper', 'scalian']
    this.getIngredients();
    this.shared.ingrArr.subscribe(ingrArr => this.selectedIngredients = ingrArr)
  }

  getSelectedIngredients() {
    this.shared.getSelectedIngredients(this.selectedIngredients)
    this.router.navigate(['/recipes']);
  }

  getIngredients() { 
    this.ingredient.getIngredients().subscribe(res => { 
      const body = JSON.parse(JSON.stringify(res));
      console.log(body);
      if(body.status == true) { 
        this.vegies = body.data.filter((ele: any) => ele.category == "Vegetables and greens")[0].ingredients
        this.herbs = body.data.filter((ele: any) => ele.category == "Herbs and spices")[0].ingredients;
        this.substitues = body.data.filter((ele: any) => ele.category == "Dairy-Free & Meat Substitutes")[0].ingredients;
        this.dairies = body.data.filter((ele: any) => ele.category == "Dairy & Eggs")[0].ingredients;
        this.bakings = body.data.filter((ele: any) => ele.category == "Baking")[0].ingredients;
        this.sugars = body.data.filter((ele: any) => ele.category == "Sugar & Sweeteners")[0].ingredients;
        this.fruits = body.data.filter((ele: any) => ele.category == "Fruits & Berries")[0].ingredients;
        this.oils = body.data.filter((ele: any) => ele.category == "Oils & Fats")[0].ingredients;
        
      } else { 
        console.log(body.data);
      }
    })
  }

  herbsClick(herb: string) { 
    this.getAllSelectedIngredients(herb)
    if(this.selectedHerbs.includes(herb)) { 
      this.selectedHerbs = this.selectedHerbs.filter(item => item !== herb);
    } else {
      this.selectedHerbs.push(herb);
    }
    
    // this.value = (!this.toggle)?"View":"Hide";
    // this.toggle = !this.toggle;
  }

  vegiesClick(veggy: string) { 
    this.getAllSelectedIngredients(veggy);
    if(this.selectedVegies.includes(veggy)) { 
      this.selectedVegies = this.selectedVegies.filter(item => item !== veggy);
    } else {
      this.selectedVegies.push(veggy);
    }
    
    // this.value = (!this.toggle)?"View":"Hide";
    // this.toggle = !this.toggle;
  }

  dairiesClick(veggy: string) { 
    this.getAllSelectedIngredients(veggy);
    if(this.selectedDairies.includes(veggy)) { 
      this.selectedDairies = this.selectedDairies.filter(item => item !== veggy);
    } else {
      this.selectedDairies.push(veggy);
    }
    
    // this.value = (!this.toggle)?"View":"Hide";
    // this.toggle = !this.toggle;
  }
  bakingsClick(veggy: string) { 
    this.getAllSelectedIngredients(veggy);
    if(this.selectedBakings.includes(veggy)) { 
      this.selectedBakings = this.selectedBakings.filter(item => item !== veggy);
    } else {
      this.selectedBakings.push(veggy);
    }
    
    // this.value = (!this.toggle)?"View":"Hide";
    // this.toggle = !this.toggle;
  }
  sugarsClick(veggy: string) { 
    this.getAllSelectedIngredients(veggy);
    if(this.selectedSugars.includes(veggy)) { 
      this.selectedSugars = this.selectedSugars.filter(item => item !== veggy);
    } else {
      this.selectedSugars.push(veggy);
    }
    
    // this.value = (!this.toggle)?"View":"Hide";
    // this.toggle = !this.toggle;
  }
  fruitsClick(veggy: string) { 
    this.getAllSelectedIngredients(veggy);
    if(this.selectedFruits.includes(veggy)) { 
      this.selectedFruits = this.selectedFruits.filter(item => item !== veggy);
    } else {
      this.selectedFruits.push(veggy);
    }
    
    // this.value = (!this.toggle)?"View":"Hide";
    // this.toggle = !this.toggle;
  }

  oilsClick(veggy: string) { 
    this.getAllSelectedIngredients(veggy);
    if(this.selectedOils.includes(veggy)) { 
      this.selectedOils = this.selectedOils.filter(item => item !== veggy);
    } else {
      this.selectedVegies.push(veggy);
    }
    
    // this.value = (!this.toggle)?"View":"Hide";
    // this.toggle = !this.toggle;
  }

  getAllSelectedIngredients(ingredient: string) { 
    if(this.selectedIngredients.includes(ingredient)) { 
      this.selectedIngredients = this.selectedIngredients.filter(item => item !== ingredient);
    } else {
      this.selectedIngredients.push(ingredient);
    }
  }

}
