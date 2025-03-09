export default [
  {
    path: '/tarik-pd',
    name: 'tarik-pd',
    component: () => import('@/views/pd/TarikPd.vue'),
    meta: {
      resource: 'Web',
      action: 'read',
      pageTitle: 'Tarik PD Emis',
      breadcrumb: [
        {
          text: 'Layanan Siswa',
        },
        {
          text: 'Tarik PD Emis',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-tarik-pd',
          link: '',
          icon: 'plus',
          variant: 'primary',
          text: 'Ajuan Baru',
          role: ['tk', 'sd', 'smp', 'sma', 'smk'],
        }
      ],
    },
  },
  {
    path: '/recovery-pd',
    name: 'recovery-pd',
    component: () => import('@/views/pd/RecoveryPd.vue'),
    meta: {
      resource: 'Web',
      action: 'read',
      pageTitle: 'Recovery Peserta Didik',
      breadcrumb: [
        {
          text: 'Layanan Siswa',
        },
        {
          text: 'Recovery Peserta Didik',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-recovery-pd',
          link: '',
          icon: 'plus',
          variant: 'primary',
          text: 'Ajuan Baru',
          role: ['tk', 'sd', 'smp', 'sma', 'smk'],
        }
      ],
    },
  },
  {
    path: '/mutasi-masuk',
    name: 'mutasi-masuk',
    component: () => import('@/views/pd/MutasiMasuk.vue'),
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
          role: ['tk', 'sd', 'smp', 'sma', 'smk'],
        }
      ],
    },
  },
  {
    path: '/pindah-rombel',
    name: 'pindah-rombel',
    component: () => import('@/views/pd/PindahRombel.vue'),
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
          role: ['tk', 'sd', 'smp', 'sma', 'smk'],
        }
      ],
    },
  },
]
