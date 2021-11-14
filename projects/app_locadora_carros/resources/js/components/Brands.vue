<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <!-- Brand searching card -->
        <div class="card mb-3">
          <div class="card-header">Brand searching</div>
          <div class="card-body">
            <div class="form-row">
              <div class="col">
                <input-container-component title="ID" id="inputId" id-help="IdHelp" help-text="Optional. Search by the brand ID.">
                  <input type="number" class="form-control" id="inputId" aria-describedby="idHelp" placeholder="ID">
                </input-container-component>
              </div>
              <div class="col">
                <input-container-component title="Name" id="inputName" name-help="NameHelp" help-text="Optional. Search by the brand name.">
                  <input type="text" class="form-control" id="inputName" aria-describedby="idName" placeholder="Name">
                </input-container-component>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm float-right">Search</button>
          </div>
        </div>

        <!-- Brand index -->
        <div class="card">
          <div class="card-header">Brands</div>
          <div class="card-body">
              <table-component></table-component>

          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm float-right">Add</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>
