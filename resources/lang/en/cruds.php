<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'country' => [
        'title'          => 'Countries',
        'title_singular' => 'Country',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'short_code'        => 'Short Code',
            'short_code_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'setting' => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
    ],
    'client' => [
        'title'          => 'Client',
        'title_singular' => 'Client',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'name'                    => 'Name',
            'name_helper'             => ' ',
            'vat'                     => 'Vat',
            'vat_helper'              => ' ',
            'address'                 => 'Address',
            'address_helper'          => ' ',
            'location'                => 'Location',
            'location_helper'         => ' ',
            'zip'                     => 'Zip',
            'zip_helper'              => ' ',
            'phone'                   => 'Phone',
            'phone_helper'            => ' ',
            'email'                   => 'Email',
            'email_helper'            => ' ',
            'country'                 => 'Country',
            'country_helper'          => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'company_name'            => 'Company Name',
            'company_name_helper'     => ' ',
            'company_vat'             => 'Company Vat',
            'company_vat_helper'      => ' ',
            'company_address'         => 'Company Address',
            'company_address_helper'  => ' ',
            'company_location'        => 'Company Location',
            'company_location_helper' => ' ',
            'company_zip'             => 'Company Zip',
            'company_zip_helper'      => ' ',
            'company_phone'           => 'Company Phone',
            'company_phone_helper'    => ' ',
            'company_email'           => 'Company Email',
            'company_email_helper'    => ' ',
            'company_country'         => 'Company Country',
            'company_country_helper'  => ' ',
        ],
    ],
    'brand' => [
        'title'          => 'Brand',
        'title_singular' => 'Brand',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'vehicle' => [
        'title'          => 'Vehicle',
        'title_singular' => 'Vehicle',
        'fields'         => [
            'id'                                        => 'ID',
            'id_helper'                                 => ' ',
            'license'                                   => 'License',
            'license_helper'                            => ' ',
            'brand'                                     => 'Brand',
            'brand_helper'                              => ' ',
            'model'                                     => 'Model',
            'model_helper'                              => ' ',
            'year'                                      => 'Year',
            'year_helper'                               => ' ',
            'motor_nr'                                  => 'Motor Nr',
            'motor_nr_helper'                           => ' ',
            'vehicle_identification_number_vin'         => 'Vehicle Identification Number (Vin)',
            'vehicle_identification_number_vin_helper'  => ' ',
            'license_date'                              => 'License Date',
            'license_date_helper'                       => ' ',
            'color'                                     => 'Color',
            'color_helper'                              => ' ',
            'kilometers'                                => 'Kilometers',
            'kilometers_helper'                         => ' ',
            'seller_client'                             => 'Seller Client',
            'seller_client_helper'                      => ' ',
            'seller_company'                            => 'Seller Company',
            'seller_company_helper'                     => ' ',
            'buyer_client'                              => 'Buyer Client',
            'buyer_client_helper'                       => ' ',
            'buyer_company'                             => 'Buyer Company',
            'buyer_company_helper'                      => ' ',
            'purchase_and_sale_agreement'               => 'Purchase And Sale Agreement',
            'purchase_and_sale_agreement_helper'        => ' ',
            'copy_of_the_citizen_card'                  => 'Copy Of The Citizen Card',
            'copy_of_the_citizen_card_helper'           => ' ',
            'tax_identification_card'                   => 'Tax Identification Card',
            'tax_identification_card_helper'            => ' ',
            'copy_of_the_stamp_duty_receipt'            => 'Copy Of The Stamp Duty Receipt',
            'copy_of_the_stamp_duty_receipt_helper'     => ' ',
            'vehicle_registration_document'             => 'Vehicle Registration Document',
            'vehicle_registration_document_helper'      => ' ',
            'vehicle_ownership_title'                   => 'Vehicle Ownership Title',
            'vehicle_ownership_title_helper'            => ' ',
            'vehicle_keys'                              => 'Vehicle Keys',
            'vehicle_keys_helper'                       => ' ',
            'vehicle_manuals'                           => 'Vehicle Manuals',
            'vehicle_manuals_helper'                    => ' ',
            'release_of_reservation_or_mortgage'        => 'Release Of Reservation Or Mortgage',
            'release_of_reservation_or_mortgage_helper' => ' ',
            'leasing_agreement'                         => 'Leasing Agreement',
            'leasing_agreement_helper'                  => ' ',
            'date'                                      => 'Date',
            'date_helper'                               => ' ',
            'pending'                                   => 'Pending',
            'pending_helper'                            => ' ',
            'additional_items'                          => 'Additional Items',
            'additional_items_helper'                   => ' ',
            'created_at'                                => 'Created at',
            'created_at_helper'                         => ' ',
            'updated_at'                                => 'Updated at',
            'updated_at_helper'                         => ' ',
            'deleted_at'                                => 'Deleted at',
            'deleted_at_helper'                         => ' ',
            'documents'                                 => 'Documents',
            'documents_helper'                          => ' ',
            'purchase_price'                            => 'Purchase Price',
            'purchase_price_helper'                     => ' ',
            'photos'                                    => 'Photos',
            'photos_helper'                             => ' ',
            'suplier'                                   => 'Suplier',
            'suplier_helper'                            => ' ',
            'invoice'                                   => 'Invoice',
            'invoice_helper'                            => ' ',
            'payment_date'                              => 'Payment Date',
            'payment_date_helper'                       => ' ',
            'payment_status'                            => 'Payment Status',
            'payment_status_helper'                     => ' ',
            'amount_paid'                               => 'Amount Paid',
            'amount_paid_helper'                        => ' ',
            'inicial'                                   => 'Inicial photos',
            'inicial_helper'                            => ' ',
        ],
    ],
    'suplier' => [
        'title'          => 'Suplier',
        'title_singular' => 'Suplier',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'paymentStatus' => [
        'title'          => 'Payment Status',
        'title_singular' => 'Payment Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'pickup' => [
        'title'          => 'Pickup',
        'title_singular' => 'Pickup',
        'fields'         => [
            'id'                                   => 'ID',
            'id_helper'                            => ' ',
            'vehicle'                              => 'Vehicle',
            'vehicle_helper'                       => ' ',
            'suplier'                              => 'Suplier',
            'suplier_helper'                       => ' ',
            'created_at'                           => 'Created at',
            'created_at_helper'                    => ' ',
            'updated_at'                           => 'Updated at',
            'updated_at_helper'                    => ' ',
            'deleted_at'                           => 'Deleted at',
            'deleted_at_helper'                    => ' ',
            'carrier'                              => 'Carrier',
            'carrier_helper'                       => ' ',
            'storage_location'                     => 'Storage Location',
            'storage_location_helper'              => ' ',
            'withdrawal_authorization'             => 'Withdrawal Authorization',
            'withdrawal_authorization_helper'      => ' ',
            'withdrawal_authorization_file'        => 'Withdrawal Authorization File',
            'withdrawal_authorization_file_helper' => ' ',
            'withdrawal_authorization_date'        => 'Withdrawal Authorization Date',
            'withdrawal_authorization_date_helper' => ' ',
            'documents'                            => 'Documents',
            'documents_helper'                     => ' ',
            'pickup_state'                         => 'Pickup State',
            'pickup_state_helper'                  => ' ',
            'pickup_state_date'                    => 'Pickup State Date',
            'pickup_state_date_helper'             => ' ',
        ],
    ],
    'carrier' => [
        'title'          => 'Carrier',
        'title_singular' => 'Carrier',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'pickupState' => [
        'title'          => 'Pickup State',
        'title_singular' => 'Pickup State',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],

];
