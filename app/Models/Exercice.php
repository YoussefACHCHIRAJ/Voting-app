<?php

namespace App\Models;

use App\Exceptions\DuplicateVoteException;
use App\Exceptions\VoteNotFoundException;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = [];

    /**
     *
     *
     * @return array
     */

    public function sluggable(): array
    {
        return [
            "slug" => [
                'source' => 'title',
            ],
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    public function votes()
    {
        return $this->belongsToMany(User::class, 'votes');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function isExerciceVotedByUser(?User $user)
    {

        if (!$user) {
            return false;
        }

        return Vote::where('user_id', $user->id)
            ->where('exercice_id', $this->id)
            ->exists();
    }

    public function vote(?User $user)
    {
        if ($this->isExerciceVotedByUser($user)) throw new DuplicateVoteException;

        Vote::create([
            'exercice_id' => $this->id,
            'user_id' => $user->id
        ]);
    }
    public function removeVote(User $user)
    {
        $votedExercice = Vote::where('exercice_id', $this->id)
            ->where('user_id', $user->id)
            ->first();

        if (!$votedExercice) throw new VoteNotFoundException;

        $votedExercice->delete();
    }
}
