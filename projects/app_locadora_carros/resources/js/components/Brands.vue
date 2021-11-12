<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Brands</div>
          <div class="card-body">
            <div class="form-row">
              <div class=" col form-group">
                <label for="inputId">Brand searching</label>
                <input type="number" class="form-control" id="inputId" aria-describedby="idHelp" placeholder="ID">
                <small id="idHelp" class="form-text text-muted">Optional. Search by the brand ID.</small>
              </div>
              <div class="col form-group">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" id="inputName" aria-describedby="nameHelp" placeholder="Name">
                <small id="nameHelp" class="form-text text-muted">Optional. Search by the brand name.</small>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm float-right">Search</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
