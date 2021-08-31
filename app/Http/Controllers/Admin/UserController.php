<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSellerRequest;
use App\Http\Resources\CreateSellerResource;
use App\Interfaces\StoreServiceInterface;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;

class UserController extends Controller
{


    /**
     * @var StoreServiceInterface
     */
    private $storeService;

    public function __construct(StoreServiceInterface $storeService)
    {
        $this->storeService = $storeService;
    }


    public function createSeller(CreateSellerRequest $request)
    {
        $user_id = $request->owner_id;
        // make user seller if not
        if (!UserRole::whereUserId($user_id)->whereRoleId(Role::SELLER_ROLE_ID)->count()) {
            UserRole::create([
                'user_id' => $user_id,
                'role_id' => Role::SELLER_ROLE_ID
            ]);
        }
        return new CreateSellerResource(["store" => $this->storeService->createNewStore([
            'owner_id' => $request->owner_id,
            'name' => $request->name,
            'lat' => $request->lat,
            'long' => $request->long,
            'service_radius' => $request->service_radius,
            'address' => $request->address
        ]), "user" => User::find($user_id)]);

    }
}
