<template>
  <b-modal v-model="showAddModal" size="xl" :title="t(title)" @ok="handleOk" ok-variant="primary">
    <!--size="xl" scrollable-->
    <b-row>
      <b-col cols="12">
        <b-form-group label-for="nama" label-cols-md="3" :invalid-feedback="feedback.nama" :state="state.nama">
          <template #label>
              Nama Siswa <span class="text-danger">*</span>
            </template>
          <b-form-input v-model="form.nama" :state="state.nama" />
        </b-form-group>
      </b-col>
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
        <b-form-group label-for="tempat_lahir" label-cols-md="3" :invalid-feedback="feedback.tempat_lahir" :state="state.tempat_lahir">
          <template #label>
              Tempat Lahir <span class="text-danger">*</span>
            </template>
          <b-form-input v-model="form.tempat_lahir" :state="state.tempat_lahir" />
        </b-form-group>
      </b-col>
      <b-col cols="12">
        <b-form-group label-cols-md="3" :invalid-feedback="feedback.tanggal_lahir" :state="state.tanggal_lahir">
          <template #label>
            Tanggal Lahir<span class="text-danger">*</span>
          </template>
          <b-input-group>
            <b-form-select v-model="form.tahun" :options="data_tahun" :state="state.tanggal_lahir"></b-form-select>
            <b-form-select v-model="form.bulan" :options="data_bulan" :state="state.tanggal_lahir"></b-form-select>
            <b-form-select v-model="form.tanggal" :options="data_tanggal" :state="state.tanggal_lahir"></b-form-select>
          </b-input-group>
          <b-form-invalid-feedback>{{ feedback.tanggal_lahir }}aa</b-form-invalid-feedback>
        </b-form-group>
      </b-col>
      <b-col cols="12">
        <b-form-group label-for="rombel" label-cols-md="3" :invalid-feedback="feedback.rombel" :state="state.rombel">
          <template #label>
              Rombel Tujuan <span class="text-danger">*</span>
            </template>
          <b-form-input v-model="form.rombel" :state="state.rombel" />
        </b-form-group>
      </b-col>
      <b-col cols="12">
        <b-form-group label-for="npsn" label-cols-md="3" :invalid-feedback="feedback.npsn" :state="state.npsn">
          <template #label>
              NPSN Sekolah Asal <span class="text-danger">*</span>
            </template>
          <b-form-input v-model="form.npsn" :state="state.npsn" />
        </b-form-group>
      </b-col>
      <b-col cols="12">
        <b-form-group label-for="nama_sekolah" label-cols-md="3" :invalid-feedback="feedback.nama_sekolah" :state="state.nama_sekolah">
          <template #label>
              Nama Sekolah Asal <span class="text-danger">*</span>
            </template>
          <b-form-input v-model="form.nama_sekolah" :state="state.nama_sekolah" />
        </b-form-group>
      </b-col>
      <b-col cols="12">
        <b-form-group label-for="provinsi_id" label-cols-md="3" :invalid-feedback="feedback.provinsi_id" :state="state.provinsi_id">
          <template #label>
            Provinsi Sekolah Asal <span class="text-danger">*</span>
          </template>
          <b-overlay :show="loading_provinsi" opacity="0.6" size="md" spinner-variant="secondary">
            <v-select id="provinsi_id" v-model="form.provinsi_id" :reduce="nama => nama.kode_wilayah" label="nama" :options="data_provinsi" placeholder="Pilih Provinsi" :state="state.provinsi_id" @input="getKabupaten">
              <template #no-options="{ search, searching, loading }">
                Tidak ada data untuk ditampilkan
              </template>
            </v-select>
          </b-overlay>
        </b-form-group>
      </b-col>
      <b-col cols="12">
        <b-form-group label-for="kabupaten_id" label-cols-md="3" :invalid-feedback="feedback.kabupaten_id" :state="state.kabupaten_id">
          <template #label>
            Kab/Kota Sekolah Asal <span class="text-danger">*</span>
          </template>
          <b-overlay :show="loading_kabupaten" opacity="0.6" size="md" spinner-variant="secondary">
            <v-select id="kabupaten_id" v-model="form.kabupaten_id" :reduce="nama => nama.kode_wilayah" label="nama" :options="data_kabupaten" placeholder="Pilih Kabupaten/Kota" :state="state.kabupaten_id" @input="getKecamatan">
              <template #no-options="{ search, searching, loading }">
                Tidak ada data untuk ditampilkan
              </template>
            </v-select>
          </b-overlay>
        </b-form-group>
      </b-col>
      <b-col cols="12">
        <b-form-group label-for="kecamatan_id" label-cols-md="3" :invalid-feedback="feedback.kecamatan_id" :state="state.kecamatan_id">
          <template #label>
            Kecamatan Sekolah Asal <span class="text-danger">*</span>
          </template>
          <b-overlay :show="loading_kecamatan" opacity="0.6" size="md" spinner-variant="secondary">
            <v-select id="kecamatan_id" v-model="form.kecamatan_id" :reduce="nama => nama.kode_wilayah" label="nama" :options="data_kecamatan" placeholder="Pilih Kecamatan" :state="state.kecamatan_id">
              <template #no-options="{ search, searching, loading }">
                Tidak ada data untuk ditampilkan
              </template>
            </v-select>
          </b-overlay>
        </b-form-group>
      </b-col>
      <b-col cols="12">
        <b-form-group label-for="keterangan" label-cols-md="3">
          <template #label>
              Keterangan <span class="text-danger">*</span>
            </template>
          <b-form-input v-model="form.keterangan" />
        </b-form-group>
      </b-col>
    </b-row>
    <template #modal-footer="{ ok, cancel }">
      <b-overlay :show="loading_modal" rounded opacity="0.6" spinner-small spinner-variant="secondary" class="d-inline-block">
        <b-button @click="cancel()">{{ t('Cancel') }}</b-button>
      </b-overlay>
      <b-overlay :show="loading_modal" rounded opacity="0.6" spinner-small spinner-variant="primary" class="d-inline-block">
        <b-button variant="primary" @click="ok()">{{ t('Submit') }}</b-button>
      </b-overlay>
    </template>
  </b-modal>
</template>

<script>
import { BOverlay, BButton, BRow, BCol, BFormGroup, BFormInput, BFormInvalidFeedback, BFormSelect, BInputGroup } from 'bootstrap-vue'
import vSelect from 'vue-select'
import eventBus from '@core/utils/eventBus';
import { useUtils as useI18nUtils } from '@core/libs/i18n'
export default {
  components: {
    BOverlay, BButton, BRow, BCol, BFormGroup, BFormInput, BFormInvalidFeedback, BFormSelect, BInputGroup,
    vSelect
  },
  setup() {
    const { t } = useI18nUtils()
    return {
      // i18n
      t,
    }
  },
  data() {
    return {
      config: {
        mode: 'range', 
        locale : {
          weekdays: {
            shorthand: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
            longhand: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
          },
          months: {
            shorthand: [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "Mei",
              "Jun",
              "Jul",
              "Agu",
              "Sep",
              "Okt",
              "Nov",
              "Des",
            ],
            longhand: [
              "Januari",
              "Februari",
              "Maret",
              "April",
              "Mei",
              "Juni",
              "Juli",
              "Agustus",
              "September",
              "Oktober",
              "November",
              "Desember",
            ],
          },
          rangeSeparator: ' s/d ',
        }, 
        altInput: true,
        altFormat: 'j F Y', 
        dateFormat: 'Y-m-d',
      },
      title: '',
      action: '',
      showAddModal: false,
      loading_modal: false,
      form: {
        data: 'mutasi-masuk',
        id: null,
        sekolah_id: null,
        nama: null,
        nisn: null,
        nik: null,
        tempat_lahir: null,
        tahun: null,
        bulan: null,
        tanggal: null,
        tanggal_lahir: null,
        rombel: null,
        npsn: null,
        nama_sekolah: null,
        provinsi_id: null,
        kabupaten_id: null,
        kecamatan_id: null,
        keterangan: null,
      },
      feedback: {
        nama: null,
        nisn: null,
        nik: null,
        tempat_lahir: null,
        tahun: null,
        bulan: null,
        tanggal: null,
        rombel: null,
        npsn: null,
        nama_sekolah: null,
        provinsi_id: null,
        kabupaten_id: null,
        kecamatan_id: null,
        tanggal_lahir: null,
      },
      state: {
        nama: null,
        nisn: null,
        nik: null,
        tempat_lahir: null,
        tahun: null,
        bulan: null,
        tanggal: null,
        rombel: null,
        npsn: null,
        nama_sekolah: null,
        provinsi_id: null,
        kabupaten_id: null,
        kecamatan_id: null,
        tanggal_lahir: null,
      },
      loading_provinsi: false,
      data_provinsi: [],
      loading_kabupaten: false,
      data_kabupaten: [],
      loading_kecamatan: false,
      data_kecamatan: [],
      data_tahun: [
        { value: null, text: 'Tahun' }
      ],
      data_bulan: [
        { value: null, text: 'Bulan' }
      ],
      data_tanggal: [
        { value: null, text: 'Tanggal' }
      ],
    }
  },
  created() {
    eventBus.$on('add-mutasi-masuk', this.showModal);
    let start_year = new Date().getFullYear() - 1;
    for (var i = start_year; i > start_year - 100; i--) {
      this.data_tahun.push({
        value: i, text: i
      })
    }
    this.config.locale.months.longhand.forEach((el, index) => {
      let angka = index + 1
      let text = angka.toString().padStart(2, '0')
      this.data_bulan.push({
        value: text, text: el
      })
    });
    for (let i = 1; i < 32; i++) {
      let text = i.toString().padStart(2, '0')
      this.data_tanggal.push({
        value: text, text: text
      })
    }
  },
  methods: {
    showModal(data){
      this.form.sekolah_id = this.user.sekolah_id
      this.getProvinsi();
      if(data){
        this.title = 'Edit Ajuan Mutasi Masuk'
        this.form.id = data.id
        this.form.nama = data.nama
        this.form.nisn = data.nisn
        this.form.nik = data.nik
        this.form.tempat_lahir = data.tempat_lahir
        this.form.rombel = data.rombel
        this.form.tahun = data.tahun
        this.form.bulan = data.bulan
        this.form.tanggal = data.tanggal
        this.form.npsn = data.npsn
        this.form.nama_sekolah = data.nama_sekolah
        //this.form.provinsi_id = data.provinsi_id
        //this.form.kabupaten_id = data.kabupaten_id
        this.form.kecamatan_id = data.kode_wilayah
        this.form.tanggal_lahir = data.tahun+'-'+data.bulan+'-'+data.tanggal
        this.form.keterangan = data.keterangan
        this.getKabupaten();
        this.getKecamatan();
      } else {
        this.title = 'Tambah Ajuan Mutasi Masuk'
      }
      this.showAddModal = true
    },
    getProvinsi(){
      this.loading_provinsi = true
      this.$http.post('/dashboard/wilayah').then(response => {
        this.loading_provinsi = false
        let getData = response.data
        this.data_provinsi = getData
      });
    },
    getKabupaten(val){
      this.loading_kabupaten = true
      this.$http.post('/dashboard/wilayah', {
        provinsi_id:val,
      }).then(response => {
        this.loading_kabupaten = false
        let getData = response.data
        this.data_kabupaten = getData
      });
    },
    getKecamatan(val){
      this.loading_kecamatan = true
      this.$http.post('/dashboard/wilayah', {
        kabupaten_id: val,
      }).then(response => {
        this.loading_kecamatan = false
        let getData = response.data
        this.data_kecamatan = getData
      });  
    },
    hideModal(){
      this.showAddModal = false
      this.form.id = null
      this.form.nama = null
      this.form.nisn = null
      this.form.nik = null
      this.form.tempat_lahir = null
      this.form.rombel = null
      this.form.tahun = null
      this.form.bulan = null
      this.form.tanggal = null
      this.form.npsn = null
      this.form.nama_sekolah = null
      this.form.provinsi_id = null
      this.form.kabupaten_id = null
      this.form.kecamatan_id = null
      this.form.keterangan = null
      this.feedback.nama = null
      this.feedback.nisn = null
      this.feedback.nik = null
      this.feedback.tempat_lahir = null
      this.feedback.rombel = null
      this.feedback.tahun = null
      this.feedback.bulan = null
      this.feedback.tanggal = null
      this.feedback.npsn = null
      this.feedback.nama_sekolah = null
      this.feedback.provinsi_id = null
      this.feedback.kabupaten_id = null
      this.feedback.kecamatan_id = null
      this.feedback.tanggal_lahir = null
      this.state.provinsi_id = null
      this.state.nama = null
      this.state.nisn = null
      this.state.nik = null
      this.state.tempat_lahir = null
      this.state.rombel = null
      this.state.tahun = null
      this.state.bulan = null
      this.state.tanggal = null
      this.state.npsn = null
      this.state.nama_sekolah = null
      this.state.provinsi_id = null
      this.state.kabupaten_id = null
      this.state.kecamatan_id = null
      this.state.tanggal_lahir = null
    },
    handleOk(bvModalEvent) {
      // Prevent modal from closing
      bvModalEvent.preventDefault()
      // Trigger submit handler
      this.handleSubmit()
    },
    handleSubmit() {
      if(this.form.tahun && this.form.bulan && this.form.tanggal){
        this.form.tanggal_lahir = this.form.tahun+'-'+this.form.bulan+'-'+this.form.tanggal
      }
      this.loading_modal = true
      this.$http.post('/datatables', this.form).then(response => {
        this.loading_modal = false
        let getData = response.data
        if(getData.errors){
          this.feedback.nama = (getData.errors.nama) ? getData.errors.nama.join(', ') : ''
          this.feedback.nisn = (getData.errors.nisn) ? getData.errors.nisn.join(', ') : ''
          this.feedback.nik = (getData.errors.nik) ? getData.errors.nik.join(', ') : ''
          this.feedback.tempat_lahir = (getData.errors.tempat_lahir) ? getData.errors.tempat_lahir.join(', ') : ''
          this.feedback.rombel = (getData.errors.rombel) ? getData.errors.rombel.join(', ') : ''
          this.feedback.tahun = (getData.errors.tahun) ? getData.errors.tahun.join(', ') : ''
          this.feedback.bulan = (getData.errors.bulan) ? getData.errors.bulan.join(', ') : ''
          this.feedback.tanggal = (getData.errors.tanggal) ? getData.errors.tanggal.join(', ') : ''
          this.feedback.npsn = (getData.errors.npsn) ? getData.errors.npsn.join(', ') : ''
          this.feedback.nama_sekolah = (getData.errors.nama_sekolah) ? getData.errors.nama_sekolah.join(', ') : ''
          this.feedback.provinsi_id = (getData.errors.provinsi_id) ? getData.errors.provinsi_id.join(', ') : ''
          this.feedback.kabupaten_id = (getData.errors.kabupaten_id) ? getData.errors.kabupaten_id.join(', ') : ''
          this.feedback.kecamatan_id = (getData.errors.kecamatan_id) ? getData.errors.kecamatan_id.join(', ') : ''
          this.feedback.tanggal_lahir = (getData.errors.tanggal_lahir) ? getData.errors.tanggal_lahir.join(', ') : ''
          this.state.nama = (getData.errors.nama) ? false : null
          this.state.nisn = (getData.errors.nisn) ? false : null
          this.state.nik = (getData.errors.nik) ? false : null
          this.state.tempat_lahir = (getData.errors.tempat_lahir) ? false : null
          this.state.tahun = (getData.errors.tahun) ? false : null
          this.state.bulan = (getData.errors.bulan) ? false : null
          this.state.tanggal = (getData.errors.tanggal) ? false : null
          this.state.npsn = (getData.errors.npsn) ? false : null
          this.state.nama_sekolah = (getData.errors.nama_sekolah) ? false : null
          this.state.provinsi_id = (getData.errors.provinsi_id) ? false : null
          this.state.kabupaten_id = (getData.errors.kabupaten_id) ? false : null
          this.state.kecamatan_id = (getData.errors.kecamatan_id) ? false : null
          this.state.tanggal_lahir = (getData.errors.tanggal_lahir) ? false : null
          this.state.rombel = (getData.errors.rombel) ? false : null
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
