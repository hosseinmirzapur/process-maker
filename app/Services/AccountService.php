<?php

namespace App\Services;

use App\Http\Resources\AccountResource;
use App\Models\Account;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Hash;

class AccountService
{
    /**
     * @return AnonymousResourceCollection
     */
    public function all(): AnonymousResourceCollection
    {
        return AccountResource::collection(Account::all());
    }

    /**
     * @param $id
     * @return AccountResource
     */
    public function find($id): AccountResource
    {
        $account = Account::query()->findOrFail($id);
        return AccountResource::make($account);
    }

    /**
     * @param array $data
     * @return AccountResource
     */
    public function create(array $data): AccountResource
    {
        $data['password'] = Hash::make($data['password']);
        $account = Account::query()->create($data);
        return AccountResource::make($account);
    }

    /**
     * @param array $data
     * @param $id
     * @return AccountResource
     */
    public function update(array $data, $id): AccountResource
    {
        $account = Account::query()->findOrFail($id);
        $account->update($data);
        return AccountResource::make($account);
    }

    public function delete($id)
    {
        $account = Account::query()->findOrFail($id);
        return $account->delete();
    }

    /**
     * @param $id
     * @param $old
     * @param $new
     * @param $confirm
     * @return bool|int
     */
    public function changePass($id, $old, $new, $confirm): bool|int
    {
        $account = Account::query()->findOrFail($id);

        if (!Hash::check($old, $account->getAttribute('password'))) {
            return false;
        }

        if ($new != $confirm) {
            return false;
        }

        return $account->update([
            'password' => Hash::make($new)
        ]);
    }
}
