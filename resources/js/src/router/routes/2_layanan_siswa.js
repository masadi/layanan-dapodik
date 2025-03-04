export default [
  {
    path: '/mutasi-masuk',
    name: 'mutasi-masuk',
    component: () => import('@/views/MutasiMasuk.vue'),
    meta: {
      resource: 'Web',
      action: 'read',
      pageTitle: 'Mutasi Masuk Siswa',
      breadcrumb: [
        {
          text: 'Layanan Siswa',
        },
        {
          text: 'Mutasi Masuk',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-mutasi-masuk',
          link: '',
          icon: 'plus',
          variant: 'primary',
          text: 'Ajuan Baru',
          role: ['sekolah'],
        }
      ],
    },
  },
  {
    path: '/pindah-rombel',
    name: 'pindah-rombel',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'Web',
      action: 'read',
      pageTitle: 'Pindah Rombel Siswa',
      breadcrumb: [
        {
          text: 'Layanan Siswa',
        },
        {
          text: 'Pindah Rombel',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-pindah-rombel',
          link: '',
          icon: 'plus',
          variant: 'primary',
          text: 'Ajuan Baru',
          role: ['sekolah'],
        }
      ],
    },
  },
]
