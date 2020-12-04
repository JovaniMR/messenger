<template>
  <div class="container">
    <div class="row justify-content-center mt-3">
      <div class="col-lg-4 login">
        <div class="card mb-2">
          <div class="card-body">
            <!-- {{-- Profile  --}} -->

            <form action="" method="post" enctype="multipart/form-data">
              <input
                    type="hidden"
                    name="_token"
                    v-model="csrfToken"
                  />

              <fieldset disabled>
                <div class="form-group" disabled>
                  <label for="inputEmail4" style="color: #777"
                    >Correo Electrónico</label
                  >
                  <input
                    type="email"
                    class="form-control"
                    id="inputEmail4"
                    name="email"
                    v-model="user.email"
                  />
                </div>
              </fieldset>

              <div class="form-group" required>
                <label for="inputAddress" style="color: #777">Nombre</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputAddress"
                  placeholder="1234 Main St"
                  name="name"
                  v-model="user.name"
                />
              </div>
              <div class="form-group">
                <label for="pass" style="color: #777">Nueva Contraseña </label>
                <label for="pass" style="color: #777"
                  >(Soló si se desea cambiar)</label
                >
                <input
                  type="password"
                  class="form-control"
                  id="pass"
                  placeholder="Nueva contraseña"
                  name="password"
                />
              </div>

              <div class="form-group">
                
                <label for="exampleFormControlFile1" style="color: #777"
                  >Elije tu foto (Tamaño: 100x100 px)</label
                >
              
                <label for="pass" style="color: #777"
                  >(Soló si se desea cambiar)</label
                >
                <div>
                        <img :src="image" alt="avatar"  class="rounded-circle" style="width: 50px;">
                </div>
                <input
                  type="file"
                  class="form-control-file"
                  id="exampleFormControlFile1"
                  name="image"
                />
              </div>
              <hr />
              <div class="form-group text-center">
                <button type="submit" class="btn btn-success btn-sm btn-block">
                  Actualizar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    user: Object,
    csrfToken: String
  },
  data() {
    return {};
  },
  computed:{
    image(){
      return `/images/${this.user.image}`
    }
  }
};
</script>