@extends('layout.app')
    @section('content')
        <div class="container-fluid">
            <div class=row>
                <div class="card">
                    <div class="row g-3">
                        <div class="col-md-6" class="form-group">
                          <input type="text" class="form-control" placeholder="First name" aria-label="First name">
                        </div>
                        <div class="col-md-6" class="form-group">
                          <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                        </div>
                        <div  class="form-group">
                            <input type="text" class="form-control" placeholder="adresse" >
                          </div>
                      </div>
                      <div class="col-md-6" class="form-group">
                        <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                      </div>
                </div>
            </div
        </div>
    @endsection