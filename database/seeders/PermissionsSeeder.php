<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    { 
    /*    
        // Unit settings permissions
        $unitaddPermission = Permission::create(['name' => 'unit add' ,'group'=>'unit']);
        $uniteditPermission = Permission::create(['name' => 'unit edit' ,'group'=>'unit']);
        $unitdeletePermission = Permission::create(['name' => 'unit delete' ,'group'=>'unit']);
        $unitviewPermission = Permission::create(['name' => 'unit view' ,'group'=>'unit']);
        
        // Aria settings permissions
        $ariaaddPermission = Permission::create(['name' => 'aria add' ,'group'=>'aria']);
        $ariaeditPermission = Permission::create(['name' => 'aria edit' ,'group'=>'aria']);
        $ariadeletePermission = Permission::create(['name' => 'aria delete' ,'group'=>'aria']);
        $ariaviewPermission = Permission::create(['name' => 'aria view' ,'group'=>'aria']);
        
        // Supplier settings permissions
        $supplieraddPermission = Permission::create(['name' => 'supplier add' ,'group'=>'supplier']);
        $suppliereditPermission = Permission::create(['name' => 'supplier edit' ,'group'=>'supplier']);
        $supplierdeletePermission = Permission::create(['name' => 'supplier delete' ,'group'=>'supplier']);
        $supplierviewPermission = Permission::create(['name' => 'supplier view' ,'group'=>'supplier']);
        
        // courier settings permissions
        $courieraddPermission = Permission::create(['name' => 'courier add' ,'group'=>'courier']);
        $couriereditPermission = Permission::create(['name' => 'courier edit' ,'group'=>'courier']);
        $courierdeletePermission = Permission::create(['name' => 'courier delete' ,'group'=>'courier']);
        $courierviewPermission = Permission::create(['name' => 'courier view' ,'group'=>'courier']);
        
        // Category settings permissions
        $categoryaddPermission = Permission::create(['name' => 'category add' ,'group'=>'category']);
        $categoryeditPermission = Permission::create(['name' => 'category edit' ,'group'=>'category']);
        $categorydeletePermission = Permission::create(['name' => 'category delete' ,'group'=>'category']);
        $categoryviewPermission = Permission::create(['name' => 'category view' ,'group'=>'category']);

        // Product Permissions
        $productAddPermission = Permission::create(['name' => 'product Add' ,'group'=>'product']);
        $productEditPermission = Permission::create(['name' => 'product Edit' ,'group'=>'product']);
        $productDeletePermission = Permission::create(['name' => 'product Delete' ,'group'=>'product']);
        $productApprovePermission = Permission::create(['name' => 'product Approve' ,'group'=>'product']);
        $productViewPermission = Permission::create(['name' => 'product View' ,'group'=>'product']);
        

        //Customer Permissions
        $customerViewPermission = Permission::create(['name' => 'customer View' ,'group'=>'customer']);
        $customersuspendPermission = Permission::create(['name' => 'customer suspend' ,'group'=>'customer']);
       

        // Role permissions
        $roleaddPermission = Permission::create(['name' => 'role add' ,'group'=>'role']);
        $roleeditPermission = Permission::create(['name' => 'role edit' ,'group'=>'role']);
        $roledeletePermission = Permission::create(['name' => 'role delete' ,'group'=>'role']);
        $roleviewPermission = Permission::create(['name' => 'role view' ,'group'=>'role']);

        // Assign permissions to roles
        //$superAdminRole->givePermissionTo([$adminAddPermission, $adminEditPermission, $adminDeletePermission, $productAddPermission, $productEditPermission, $productDeletePermission, $productApprovePermission]);
        //$adminRole->givePermissionTo($productAddPermission);

    */        
        $permissionsArray=[
            [
                'group'=> 'unit',
                'permissions' =>[
                    'unit add',
                    'unit edit',
                    'unit delete',
                    'unit view'
                ]
            ],

            [
                'group'=> 'aria',
                'permissions' =>[
                    'aria add',
                    'aria edit',
                    'aria delete',
                    'aria view'
                ]
            ],
/*             
            [
                'group'=> 'supplier',
                'permissions' =>[
                    'supplier add',
                    'supplier edit',
                    'supplier delete',
                    'supplier view'
                ]
            ],

            [
                'group'=> 'courier',
                'permissions' =>[
                    'courier add',
                    'courier edit',
                    'courier delete',
                    'courier view'
                ]
            ],
 */
            [
                'group'=> 'category',
                'permissions' =>[
                    'category add',
                    'category edit',
                    'category delete',
                    'category view'
                ]
            ],

            [
                'group'=> 'product',
                'permissions' =>[
                    'product add',
                    'product edit',
                    'product delete',
                    'product view'
                ]
            ],

            [
                'group'=> 'customer',
                'permissions' =>[
                    'customer add',
                    'customer edit',
                    'customer delete',
                    'customer view'
                ]
            ],

            [
                'group'=> 'role',
                'permissions' =>[
                    'role add',
                    'role edit',
                    'role delete',
                    'role view'
                ]
            ],
            
            [
                'group'=> 'admin',
                'permissions' =>[
                    'admin add',
                    'admin edit',
                    'admin delete',
                    'admin view'
                ]
            ]
        ];

    
        foreach ($permissionsArray as $permissionsElement) {
            foreach ($permissionsElement['permissions'] as $permission) {
                Permission::create([
                    'name'=>$permission,
                    'group'=>$permissionsElement['group']
                ]);
            }
        }
    }
}
