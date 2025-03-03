export default [
  {
    icon: 'settings-icon',
    title: 'Settings',
    children: [
      {
        icon: 'hand-click-icon',
        title: 'System Layout',
        route: 'system-layout-read',
        resource: 'system-layout-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Personal',
        route: 'personal-read',
        resource: 'personal-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Users',
        route: 'users-read',
        resource: 'users-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Branch Office',
        route: 'branch-office-read',
        resource: 'branch-office-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Backup Database',
        route: 'backup-database-read',
        resource: 'backup-database-read',
        action: 'read',
      },
    ],
  },
]
  