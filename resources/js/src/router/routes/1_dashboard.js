export default [
  {
    path: '/',
    name: 'dashboard',
    component: () => import('@/views/pages/Blank.vue'),
    meta: {
      resource: 'Web',
      action: 'read',
      pageTitle: 'Dashboard',
      breadcrumb: [
        {
          text: 'Dashboard',
          active: true,
        },
      ],
      tombol_add: [],
    },
  },
  {
    path: '/profile',
    name: 'profile',
    component: () => import('@/views/pages/Profile.vue'),
    meta: {
      resource: 'Profile',
      action: 'read',
      pageTitle: 'Profil Pengguna',
      breadcrumb: [
        {
          text: 'Profil Pengguna',
          active: true,
        },
      ],
      tombol_add: [],
    },
  },
]
