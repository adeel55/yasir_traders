import DashboardLayout from '@/pages/Layout/DashboardLayout.vue'

import Dashboard from '@/pages/Dashboard.vue'
import UserProfile from '@/pages/UserProfile.vue'
import CreateProfile from '@/pages/CreateVendorProfile.vue'
import VendorsList from '@/pages/VendorsList.vue'
import MarriageHallList from '@/pages/MarriageHallsList.vue'
import DishesList from '@/pages/DishesList.vue'
import RequestsList from '@/pages/RequestsList.vue'
import Typography from '@/pages/Typography.vue'
import Icons from '@/pages/Icons.vue'
import Maps from '@/pages/Maps.vue'
import Notifications from '@/pages/Notifications.vue'

const routes = [
  {
    path: '/',
    component: DashboardLayout,
    redirect: '/dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'Dashboard',
        component: Dashboard
      },
      {
        path: 'create_vendore_profile',
        name: 'Create Vendor Profile',
        component: CreateProfile
      },
      {
        path: 'user',
        name: 'User Profile',
        component: UserProfile
      },
      {
        path: 'vendorslist',
        name: 'Vendors List',
        component: VendorsList
      },
      {
        path: 'mhallslist',
        name: 'Marriage Hall List',
        component: MarriageHallList
      },
      {
        path: 'disheslist',
        name: 'Dishes List',
        component: DishesList
      },
      {
        path: 'requestslist',
        name: 'Requests List',
        component: RequestsList
      },
      {
        path: 'typography',
        name: 'Typography',
        component: Typography
      },
      {
        path: 'icons',
        name: 'Icons',
        component: Icons
      },
      {
        path: 'maps',
        name: 'Maps',
        meta: {
          hideFooter: true
        },
        component: Maps

      },
      {
        path: 'notifications',
        name: 'Notifications',
        component: Notifications
      }
    ]
  }
]

export default routes
