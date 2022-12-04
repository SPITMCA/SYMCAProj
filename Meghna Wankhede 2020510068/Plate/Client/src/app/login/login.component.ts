import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { LoginService } from '../services/login.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  user: any;
  result: any;
  constructor(private login: LoginService, private router: Router) { }

  ngOnInit(): void {
    this.user = {};
  }

  submit() { 
    if (this.validate()) { 
      this.login.login(this.user).subscribe(res => { 
        const body = JSON.parse(JSON.stringify(res));
        if(body.status == true) { 
          alert("Welcome to Delicious!");
          this.router.navigate(['/']);
        } else { 
          console.log(body.data);
          this.result = body.data;
        }
      })
    }
  }

  validate() {
    if (!this.user.hasOwnProperty('username') || this.user.username === '') {
        this.result = {status: false, error: 'Username required'};
        return false;
    }
    if (!this.user.hasOwnProperty('password') || this.user.password === '') {
        this.result = {status: false, error: 'Password required'};
        return false;
    }
    return true;
  }
}
