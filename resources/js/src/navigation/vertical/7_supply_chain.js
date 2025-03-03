export default [
  {
    icon: 'book-icon',
    title: 'Supply Chain',
    children: [
      {
        icon: 'hand-click-icon',
        title: 'Shipping List',
        route: 'shipping-list-read',
        resource: 'shipping-list-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Vehicles',
        route: 'vehicles-read',
        resource: 'vehicles-read',
        action: 'read',
      },
      {
        icon: 'hand-click-icon',
        title: 'Drivers',
        route: 'drivers-read',
        resource: 'drivers-read',
        action: 'read',
      },
    ]
  },
]
  