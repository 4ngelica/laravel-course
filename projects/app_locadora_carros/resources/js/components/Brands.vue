<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <!-- Brand searching card -->
        <card-component title="Brand searching">
          <template v-slot:content>
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
          </template>
          <template>
            <button type="submit" class="btn btn-primary btn-sm float-right">Search</button>
          </template>
        </card-component>

        <!-- Brand index card -->
        <card-component title="Brands">
          <template v-slot:content>
            <table-component></table-component>
          </template>
          <template v-slot:footer>
            <button type="submit" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#brandModal">Add</button>
          </template>
        </card-component>
      </div>
    </div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <modal-component id="brandModal" title="Add brand"></modal-component>
  </div>
</template>
