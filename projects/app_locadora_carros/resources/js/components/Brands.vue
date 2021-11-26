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

    <!-- Modal -->
    <modal-component id="brandModal" title="Add brand">
      <template v-slot:content>
        <div class="form-group">
          <input-container-component title="Brand name" id="newName" id-help="newNameHelp" help-text="Type the brand name.">
            <input type="text" class="form-control" id="newName" aria-describedby="newNameHelp" placeholder="Brand" v-model="brandName">
          </input-container-component>
        </div>

        <div class="form-group">
          <input-container-component title="Image" id="newImage" id-help="newImageHelp" help-text="Upload the brand image (.png).">
            <input type="file" class="form-control-file" id="newImage" aria-describedby="newImageHelp" placeholder="Upload image" @change="loadImage($event)">
          </input-container-component>
        </div>
      </template>
      <template v-slot:footer>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @click="save()">Save changes</button>
      </template>
    </modal-component>
  </div>
</template>

<script>
  export default {
    data(){
      return{
        baseUrl: 'http://localhost:8000/api/marca',
        brandName: '',
        imageFile: []
      }
    },
    methods:{
      loadImage(e){
        this.imageFile = e.target.files;
      },
      save(){

        let formData = new FormData();
        formData.append('nome', this.brandName);
        formData.append('imagem', this.imageFile[0]);

        let config = {
          headers: {
            'Content-Type': 'multipart/form-data',
            'Accept': 'application/json'
          }
        }

        axios.post(this.baseUrl, formData, config )
          .then(response => {
            console.log(response)
          })
          .catch(errors => {
            console.log(errors)
          })
      }
    }
  }

</script>
