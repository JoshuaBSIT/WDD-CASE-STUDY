import { Component } from '@angular/core';
import { ApiService } from '../api.service';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
  student_no: any;
  student_name: any;
  student_add: any;
 


  constructor(public _apiService: ApiService) {}

  addStudent(){ 
  let data = {
    student_no: this.student_no,
    student_name: this.student_name,
    student_add: this.student_add,


  }

  this._apiService.addStudent(data).subscribe((res:any) =>{
    console.log("Success ==", res);
  },(error:any) =>{
    console.log("Error==", error);
  })
  }

}