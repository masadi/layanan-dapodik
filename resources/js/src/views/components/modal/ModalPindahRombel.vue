<template>
  <b-modal v-model="showAddModal" size="xl" :title="title" @ok="handleOk" ok-variant="primary">
    <!--size="xl" scrollable-->
    <b-row>
      <b-col cols="12">
        <b-form-group label="NISN" label-for="nisn" label-cols-md="3">
          <b-form-input v-model="form.nisn" />
        </b-form-group>
      </b-col>
      <b-col cols="12">
        <b-form-group label-for="nik" label-cols-md="3" :invalid-feedback="feedback.nik" :state="state.nik">
          <template #label>
              NIK <span class="text-danger">*</span>
            </template>
          <b-form-input v-model="form.nik" :state="state.nik" />
        </b-form-group>
      </b-col>
      <b-col cols="12">
        <b-form-group label-for="rombel_tujuan" label-cols-md="3" :invalid-feedback="feedback.rombel_tujuan" :state="state.rombel_tujuan">
          <template #label>
              Rombel Tujuan <span class="text-danger">*</span>
            </template>
          <b-form-input v-model="form.rombel_tujuan" :state="state.rombel_tujuan" />
        </b-form-group>
      </b-col>
    </b-row>
    <template #modal-footer="{ ok, cancel }">
      <b-overlay :show="loading_modal" rounded opacity="0.6" spinner-small spinner-variant="secondary" class="d-inline-block">
        <b-button @click="cancel()">Batal</b-button>
      </b-overlay>
      <b-overlay :show="loading_modal" rounded opacity="0.6" spinner-small spinner-variant="primary" class="d-inline-block">
        <b-button variant="primary" @click="ok()">Simpan</b-button>
      </b-overlay>
    </template>
  </b-modal>
</template>

<script>
import { BRow, BCol, BFormGroup, BFormInput, BOverlay, BButton, } from 'bootstrap-vue'
import eventBus from '@core/utils/eventBus';
export default {
  components: {
    BRow, BCol, BFormGroup, BFormInput, BOverlay, BButton,
  },
  data() {
    return {
      title: '',
      action: '',
      showAddModal: false,
      loading_modal: false,
      form: {
        data: 'pindah-rombel',
        id: null,
        sekolah_id: null,
        nisn: null,
        nik: null,
        rombel_tujuan: null,
      },
      feedback: {
        nisn: null,
        nik: null,
        rombel_tujuan: null,
      },
      state: {
        nisn: null,
        nik: null,
        rombel_tujuan: null,
      },
    }
  },
  created() {
    eventBus.$on('add-pindah-rombel', this.showModal);
  },
  methods: {
    showModal(data){
      this.form.sekolah_id = this.user.sekolah_id
      if(data){
        this.title = 'Edit Ajuan Pindah Rombel'
        this.form.id = data.id
        this.form.nisn = data.nisn
        this.form.nik = data.nik
        this.form.rombel_tujuan = data.rombel_tujuan
      } else {
        this.title = 'Tambah Ajuan Pindah Rombel'
      }
      this.showAddModal = true
    },
    hideModal(){
      this.showAddModal = false
      this.form.id = null
      this.form.nisn = null
      this.form.nik = null
      this.form.rombel_tujuan = null
      this.feedback.nisn = null
      this.feedback.nik = null
      this.feedback.rombel_tujuan = null
      this.state.nisn = null
      this.state.nik = null
      this.state.rombel_tujuan = null
    },
    handleOk(bvModalEvent) {
      // Prevent modal from closing
      bvModalEvent.preventDefault()
      // Trigger submit handler
      this.handleSubmit()
    },
    handleSubmit() {
      this.loading_modal = true
      this.$http.post('/datatables', this.form).then(response => {
        this.loading_modal = false
        let getData = response.data
        if(getData.errors){
          this.feedback.nisn = (getData.errors.nisn) ? getData.errors.nisn.join(', ') : ''
          this.feedback.nik = (getData.errors.nik) ? getData.errors.nik.join(', ') : ''
          this.feedback.rombel_tujuan = (getData.errors.rombel_tujuan) ? getData.errors.rombel_tujuan.join(', ') : ''
          this.state.nisn = (getData.errors.nisn) ? false : null
          this.state.nik = (getData.errors.nik) ? false : null
          this.state.rombel_tujuan = (getData.errors.rombel_tujuan) ? false : null
        } else {
          this.$swal({
            icon: getData.icon,
            title: getData.title,
            text: getData.text,
            customClass: {
              confirmButton: 'btn btn-success',
            },
            allowOutsideClick: false,
          }).then(result => {
            this.$emit('reload')
            this.hideModal()
          })
        }
      }).catch(error => {
        console.log(error)
      })
    },
  },
}
</script>
