export default [
  {
    path: '/tarik-ptk',
    name: 'tarik-ptk',
    component: () => import('@/views/ptk/TarikPtk.vue'),
    meta: {
      resource: 'Web',
      action: 'read',
      pageTitle: 'Tarik PTK',
      breadcrumb: [
        {
          text: 'Layanan PTK',
        },
        {
          text: 'Tarik PTK',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-tarik-ptk',
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
    path: '/edit-penugasan',
    name: 'edit-penugasan',
    component: () => import('@/views/ptk/EditPenugasan.vue'),
    meta: {
      resource: 'Web',
      action: 'read',
      pageTitle: 'Edit Penugasan PTK',
      breadcrumb: [
        {
          text: 'Layanan PTK',
        },
        {
          text: 'Edit Penugasan PTK',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-edit-penugasan',
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
    path: '/recovery-ptk',
    name: 'recovery-ptk',
    component: () => import('@/views/ptk/RecoveryPtk.vue'),
    meta: {
      resource: 'Web',
      action: 'read',
      pageTitle: 'Recovery PTK',
      breadcrumb: [
        {
          text: 'Layanan PTK',
        },
        {
          text: 'Recovery PTK',
          active: true,
        },
      ],
      tombol_add: [
        {
          action: 'add-recovery-ptk',
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
    path: '/mutasi-asn',
    name: 'mutasi-asn',
    component: () => import('@/views/ptk/MutasiAsn.vue'),
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
    component: () => import('@/views/ptk/PltKepsek.vue'),
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
