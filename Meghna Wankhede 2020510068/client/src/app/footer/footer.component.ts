import { Component, OnInit } from '@angular/core';
import { RouterModule, Router, NavigationEnd } from '@angular/router';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.css']
})
export class FooterComponent implements OnInit {

  hideElement = false;
  constructor(private router: Router) {
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
  }

}
