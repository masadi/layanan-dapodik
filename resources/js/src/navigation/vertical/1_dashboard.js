export default [
    {
      icon: 'home-icon',
      route: 'dashboard',
      title: 'Dashboard',
      resource: 'Web',
      action: 'read',
    },
    {
      icon: 'users-icon',
      title: 'Layanan Siswa',
      children: [
        {
          icon: 'hand-click-icon',
          title: 'Mutasi Masuk',
          route: 'mutasi-masuk',
          resource: 'Web',
          action: 'read',
        },
        {
          icon: 'hand-click-icon',
          title: 'Pindah Rombel',
          route: 'pindah-rombel',
          resource: 'Web',
          action: 'read',
        },
      ]
    },
    {
      icon: 'school-icon',
      title: 'Layanan PTK',
      children: [
        {
          icon: 'hand-click-icon',
          title: 'Mutasi ASN',
          route: 'mutasi-asn',
          resource: 'Web',
          action: 'read',
        },
        {
          icon: 'hand-click-icon',
          title: 'PLT Kepsek Negeri',
          route: 'plt-kepsek-negeri',
          resource: 'Web',
          action: 'read',
        },
      ]
    },
    {
      icon: 'building-icon',
      title: 'Layanan Yayasan',
      children: [
        {
          icon: 'hand-click-icon',
          title: 'Pengajuan NPYP',
          route: 'pengajuan-npyp',
          resource: 'Web',
          action: 'read',
        },
        {
          icon: 'hand-click-icon',
          title: 'Kode Referral',
          route: 'pengajuan-kode-referral',
          resource: 'Web',
          action: 'read',
        },
      ]
    },
    {
      icon: 'user-icon',
      title: 'Profil',
      route: 'profile',
      resource: 'Profile',
      action: 'read',
    },
  ]
  