export default [
  {
    path: '/pengajuan-npyp',
    name: 'pengajuan-npyp',
    component: () => import('@/views/yayasan/PengajuanNpyp.vue'),
    meta: {
      resource: 'Web',
      action: 'read',
      pageTitle: 'Pengajuan NPYP',
      breadcrumb: [
        {
          text: 'Layanan yayasan',
        },
        {
          text: 'Pengajuan NPYP',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-pengajuan-npyp',
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
    path: '/pengajuan-kode-referral',
    name: 'pengajuan-kode-referral',
    component: () => import('@/views/yayasan/KodeReferral.vue'),
    meta: {
      resource: 'Web',
      action: 'read',
      pageTitle: 'Pengajuan Kode Referral',
      breadcrumb: [
        {
          text: 'Layanan yayasan',
        },
        {
          text: 'Pengajuan Kode Referral',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-pengajuan-kode-referral',
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
