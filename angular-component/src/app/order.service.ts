
import {Injectable} from '@angular/core';
import { Observable } from 'rxjs';
import {Order} from './order';
import {HttpClient, HttpErrorResponse, HttpParams} from '@angular/common/http';
@Injectable({
    providedIn: 'root'
})
export class OrderService{
    temp_order = new Order('','','','');
    //dependency inejction 
    constructor(private http: HttpClient){}

    // component.ts calls orderService.processOrder(formdata)
    //processOrder does processing
    //process Order calls sendRequest(data)
    //sendRequest sends a request to the backend

    sendRequest(data: any): Observable<any> {
        // send a request to the backend
        console.log("HEre")
       return this.http.post<any>('http://localhost/cs4640/cs4640project/ng-post', data);
    }

    processOrder(data: any): Observable<any>{
        //data cleaning
        //data processing
        return this.sendRequest(data);
    }
} 