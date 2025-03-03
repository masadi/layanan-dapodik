export default [
  {
    path: '/mutasi-asn',
    name: 'mutasi-asn',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'Web',
      action: 'read',
      pageTitle: 'Mutasi ASN',
      breadcrumb: [
        {
          text: 'Layanan PTK',
        },
        {
          text: 'Mutasi ASN',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-mutasi-asn',
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
    path: '/plt-kepsek-negeri',
    name: 'plt-kepsek-negeri',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'Web',
      action: 'read',
      pageTitle: 'PLT Kepala Sekolah Negeri',
      breadcrumb: [
        {
          text: 'Layanan PTK',
        },
        {
          text: 'PLT Kepala Sekolah Negeri',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-plt-kepsek-negeri',
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
