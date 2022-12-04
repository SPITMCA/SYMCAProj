import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { LoginService } from '../services/login.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {

  // user: any;
  result: any;
  user: FormGroup;
  constructor(private login: LoginService, private formBuilder: FormBuilder, private router: Router) { 
    this.user = this.formBuilder.group({ 
      firstName: ['', Validators.required],
      lastName: ['', Validators.required],
      email: ['', Validators.required],
      password: ['', Validators.required]
    })
  }

  ngOnInit(): void {
    
  }

  submit() { 
    console.log(this.user.value)
    if (this.user.valid) { 
      this.login.register(this.user.value).subscribe(res => { 
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

}
