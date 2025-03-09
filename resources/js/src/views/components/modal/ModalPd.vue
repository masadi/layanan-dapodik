<template>
  <b-modal v-model="showModal" size="xl" :title="t(title)" @ok="handleOk" ok-variant="primary">
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
        <b-form-group label-for="rombel_tujuan" label-cols-md="3" :invalid-feedback="feedback.rombel_tujuan" :state="state.rombel_tujuan">
          <template #label>
              Rombel Tujuan <span class="text-danger">*</span>
            </template>
          <b-form-input v-model="form.rombel_tujuan" :state="state.rombel_tujuan" />
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
        <b-form-group label-for="kode_wilayah" label-cols-md="3" :invalid-feedback="feedback.kode_wilayah" :state="state.kode_wilayah">
          <template #label>
            Kecamatan Sekolah Asal <span class="text-danger">*</span>
          </template>
          <b-overlay :show="loading_kecamatan" opacity="0.6" size="md" spinner-variant="secondary">
            <v-select id="kode_wilayah" v-model="form.kode_wilayah" :reduce="nama => nama.kode_wilayah" label="nama" :options="data_kecamatan" placeholder="Pilih Kecamatan" :state="state.kode_wilayah">
              <template #no-options="{ search, searching, loading }">
                Tidak ada data untuk ditampilkan
              </template>
            </v-select>
          </b-overlay>
        </b-form-group>
      </b-col>
      <!--
      if(this.data == 'tarik-pd'){
        this.form.jenis_data = 1
      }
      if(this.data == 'recovery-pd'){
        this.form.jenis_data = 2
      }
      if(this.data == 'mutasi-masuk'){
        this.form.jenis_data = 3
      }
      if(this.data == 'pindah-rombel'){
        this.form.jenis_data = 4
      }
      -->
      <b-col cols="12" v-if="data == 'mutasi-masuk'">
        <b-form-group label-for="file_mutasi" label-cols-md="3" :invalid-feedback="feedback.file_mutasi" :state="state.file_mutasi">
          <template #label>
              Berkas Mutasi <span class="text-danger">*</span>
            </template>
            <b-form-file accept=".jpg, .png, .jpeg, .pdf" id="file_mutasi" v-model="form.file_mutasi" placeholder="Choose a file or drop it here..." drop-placeholder="Drop file here..." @change="onFileChange($event, 'file_mutasi')" :state="state.file_mutasi" />
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
import { BOverlay, BButton, BRow, BCol, BFormGroup, BFormInput, BFormInvalidFeedback, BFormSelect, BInputGroup, BFormFile } from 'bootstrap-vue'
import vSelect from 'vue-select'
import eventBus from '@core/utils/eventBus';
import { useUtils as useI18nUtils } from '@core/libs/i18n'
export default {
  components: {
    BOverlay, BButton, BRow, BCol, BFormGroup, BFormInput, BFormInvalidFeedback, BFormSelect, BInputGroup, BFormFile,
    vSelect
  },
  setup() {
    const { t } = useI18nUtils()
    return {
      // i18n
      t,
    }
  },
  props: {
    data: {
      type: String,
      required: true
    },
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
      showModal: false,
      loading_modal: false,
      form: {
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
        kode_wilayah: null,
        file_mutasi: null,
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
        kode_wilayah: null,
        tanggal_lahir: null,
        file_mutasi: null,
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
        kode_wilayah: null,
        tanggal_lahir: null,
        file_mutasi: null,
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
    eventBus.$on(`add-${this.data}`, this.handleModal);
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
    handleModal(data){
      if(this.data == 'tarik-pd'){
        this.form.jenis_data = 1
        this.title = 'Tambah Ajuan Tarik PD'
      }
      if(this.data == 'recovery-pd'){
        this.form.jenis_data = 2
        this.title = 'Tambah Ajuan Recovery PD'
      }
      if(this.data == 'mutasi-masuk'){
        this.form.jenis_data = 3
        this.title = 'Tambah Ajuan Mutasi Masuk'
      }
      if(this.data == 'pindah-rombel'){
        this.form.jenis_data = 4
        this.title = 'Tambah Ajuan Pindah Rombel'
      }
      this.form.sekolah_id = this.user.sekolah_id
      this.getProvinsi();
      if(data){
        if(this.data == 'tarik-pd'){
          this.form.jenis_data = 1
          this.title = 'Edit Ajuan Tarik PD'
        }
        if(this.data == 'recovery-pd'){
          this.form.jenis_data = 2
          this.title = 'Edit Ajuan Recovery PD'
        }
        if(this.data == 'mutasi-masuk'){
          this.form.jenis_data = 3
          this.title = 'Edit Ajuan Mutasi Masuk'
        }
        if(this.data == 'pindah-rombel'){
          this.form.jenis_data = 4
          this.title = 'Edit Ajuan Pindah Rombel'
        }
        this.form.tahun = data.tahun
        this.form.bulan = data.bulan
        this.form.tanggal = data.tanggal
        this.form.id = data.id
        this.form.nama = data.nama
        this.form.nisn = data.nisn
        this.form.nik = data.nik
        this.form.tempat_lahir = data.tempat_lahir
        this.form.tanggal_lahir = data.tahun+'-'+data.bulan+'-'+data.tanggal
        this.form.npsn = data.npsn
        this.form.nama_sekolah = data.nama_sekolah
        this.form.rombel_tujuan = data.rombel_tujuan
        this.form.kode_wilayah = data.kode_wilayah
        this.getKabupaten();
        this.getKecamatan();
      }
      this.showModal = true
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
      this.showModal = false
      this.form.tahun = null
      this.form.bulan = null
      this.form.tanggal = null
      this.form.id = null
      this.form.nama = null
      this.form.nisn = null
      this.form.nik = null
      this.form.tempat_lahir = null
      this.form.tanggal_lahir = null
      this.form.npsn = null
      this.form.nama_sekolah = null
      this.form.rombel_tujuan = null
      this.form.provinsi_id = null
      this.form.kabupaten_id = null
      this.form.kode_wilayah = null
      this.form.file_mutasi = null
      this.feedback.tahun = null
      this.feedback.bulan = null
      this.feedback.tanggal = null
      this.feedback.nama = null
      this.feedback.nisn = null
      this.feedback.nik = null
      this.feedback.tempat_lahir = null
      this.feedback.tanggal_lahir = null
      this.feedback.npsn = null
      this.feedback.nama_sekolah = null
      this.feedback.rombel_tujuan = null
      this.feedback.provinsi_id = null
      this.feedback.kabupaten_id = null
      this.feedback.kode_wilayah = null
      this.feedback.file_mutasi = null
      this.state.tahun = null
      this.state.bulan = null
      this.state.tanggal = null
      this.state.nama = null
      this.state.nisn = null
      this.state.nik = null
      this.state.tempat_lahir = null
      this.state.tanggal_lahir = null
      this.state.npsn = null
      this.state.nama_sekolah = null
      this.state.rombel_tujuan = null
      this.state.provinsi_id = null
      this.state.kabupaten_id = null
      this.state.kode_wilayah = null
      this.state.file_mutasi = null
    },
    onFileChange(e, data) {
      this.form[data] = e.target.files[0]
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
      const formData = new FormData();
      formData.append('data', this.data);
      formData.append('jenis_data', this.form.jenis_data);
      formData.append('sekolah_id', this.form.sekolah_id);
      formData.append('id', this.form.id ? this.form.id : '');
      formData.append('tahun', this.form.tahun ? this.form.tahun : '');
      formData.append('bulan', this.form.bulan ? this.form.bulan : '');
      formData.append('tanggal', this.form.tanggal ? this.form.tanggal : '');
      formData.append('nama', this.form.nama ? this.form.nama : '');
      formData.append('nisn', this.form.nisn ? this.form.nisn : '');
      formData.append('nik', this.form.nik ? this.form.nik : '');
      formData.append('tempat_lahir', this.form.tempat_lahir ? this.form.tempat_lahir : '');
      formData.append('tanggal_lahir', this.form.tanggal_lahir ? this.form.tanggal_lahir : '');
      formData.append('npsn', this.form.npsn ? this.form.npsn : '');
      formData.append('nama_sekolah', this.form.nama_sekolah ? this.form.nama_sekolah : '');
      formData.append('rombel_tujuan', this.form.rombel_tujuan ? this.form.rombel_tujuan : '');
      formData.append('provinsi_id', this.form.provinsi_id ? this.form.provinsi_id : '');
      formData.append('kabupaten_id', this.form.kabupaten_id ? this.form.kabupaten_id : '');
      formData.append('kode_wilayah', this.form.kode_wilayah ? this.form.kode_wilayah : '');
      formData.append('file_mutasi', this.form.file_mutasi ? this.form.file_mutasi : '');
      this.$http.post('/datatables', formData).then(response => {
        this.loading_modal = false
        let getData = response.data
        if(getData.errors){
          this.feedback.tahun = (getData.errors.tahun) ? getData.errors.tahun.join(', ') : ''
          this.feedback.bulan = (getData.errors.bulan) ? getData.errors.bulan.join(', ') : ''
          this.feedback.tanggal = (getData.errors.tanggal) ? getData.errors.tanggal.join(', ') : ''
          this.feedback.nama = (getData.errors.nama) ? getData.errors.nama.join(', ') : ''
          this.feedback.nisn = (getData.errors.nisn) ? getData.errors.nisn.join(', ') : ''
          this.feedback.nik = (getData.errors.nik) ? getData.errors.nik.join(', ') : ''
          this.feedback.tempat_lahir = (getData.errors.tempat_lahir) ? getData.errors.tempat_lahir.join(', ') : ''
          this.feedback.tanggal_lahir = (getData.errors.tanggal_lahir) ? getData.errors.tanggal_lahir.join(', ') : ''
          this.feedback.npsn = (getData.errors.npsn) ? getData.errors.npsn.join(', ') : ''
          this.feedback.nama_sekolah = (getData.errors.nama_sekolah) ? getData.errors.nama_sekolah.join(', ') : ''
          this.feedback.rombel_tujuan = (getData.errors.rombel_tujuan) ? getData.errors.rombel_tujuan.join(', ') : ''
          this.feedback.provinsi_id = (getData.errors.provinsi_id) ? getData.errors.provinsi_id.join(', ') : ''
          this.feedback.kabupaten_id = (getData.errors.kabupaten_id) ? getData.errors.kabupaten_id.join(', ') : ''
          this.feedback.kode_wilayah = (getData.errors.kode_wilayah) ? getData.errors.kode_wilayah.join(', ') : ''
          this.feedback.file_mutasi = (getData.errors.file_mutasi) ? getData.errors.file_mutasi.join(', ') : ''
          this.state.tahun = (getData.errors.tahun) ? false : null
          this.state.bulan = (getData.errors.bulan) ? false : null
          this.state.tanggal = (getData.errors.tanggal) ? false : null
          this.state.nama = (getData.errors.nama) ? false : null
          this.state.nisn = (getData.errors.nisn) ? false : null
          this.state.nik = (getData.errors.nik) ? false : null
          this.state.tempat_lahir = (getData.errors.tempat_lahir) ? false : null
          this.state.tanggal_lahir = (getData.errors.tanggal_lahir) ? false : null
          this.state.npsn = (getData.errors.npsn) ? false : null
          this.state.nama_sekolah = (getData.errors.nama_sekolah) ? false : null
          this.state.rombel_tujuan = (getData.errors.rombel_tujuan) ? false : null
          this.state.provinsi_id = (getData.errors.provinsi_id) ? false : null
          this.state.kabupaten_id = (getData.errors.kabupaten_id) ? false : null
          this.state.kode_wilayah = (getData.errors.kode_wilayah) ? false : null
          this.state.file_mutasi = (getData.errors.file_mutasi) ? false : null
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
