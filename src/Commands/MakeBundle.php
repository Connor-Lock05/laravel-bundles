<?php

namespace ConnorLock05\LaravelBundles\Commands;

use ConnorLock05\LaravelBundles\Data\Makeables;
use ConnorLock05\LaravelBundles\Exceptions\NoBundlesDefined;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use function Laravel\Prompts\select;
use function Laravel\Prompts\text;

class MakeBundle extends Command
{
    protected $signature = 'make:bundle';

    protected $description = 'Makes a bundle';


    public function handle(): int
    {
        // Select Bundle to create
        try {
            $bundle = $this->getBundleToCreate();
        } catch (NoBundlesDefined $e) {
            $this->error($e->getMessage());
            return self::FAILURE;
        }

        // Get files to create
        $filesToCreate = config('bundles.bundles.' . $bundle);

        if (!$this->areAllMakeables($filesToCreate)) {
            $this->error('Bundle incorrectly configured. All array elements must be a ' . Makeables::class);
            return self::FAILURE;
        }

        foreach ($filesToCreate as $fileToCreate) {
            $this->createMakeableFile($fileToCreate);
        }

        return self::SUCCESS;
    }

    private function areAllMakeables(array $filesToCreate): bool
    {
        foreach ($filesToCreate as $fileToCreate) {
            if (!$fileToCreate instanceof Makeables)
            {
                return false;
            }
        }

        return true;
    }

    private function createMakeableFile(Makeables $makeable): void
    {
        switch ($makeable)
        {
            case Makeables::Model:
                $this->call("make:model");
                break;
            case Makeables::Migration:
                $this->call("make:migration");
                break;
            case Makeables::Controller:
                $this->call('make:controller');
                break;
            case Makeables::ResourceController:
                $this->call('make:controller', [
                    '--resource' => true
                ]);
                break;
            case Makeables::Command:
                $this->call('make:command');
                break;
            case Makeables::Event:
                $this->call('make:event');
                break;
            case Makeables::Listener:
                $this->call('make:listener');
                break;
            case Makeables::Mail:
                $this->call('make:mail');
                break;
            case Makeables::Notification:
                $this->call('make:notification');
                break;
            case Makeables::Policy:
                $this->call('make:policy');
                break;
            case Makeables::Request:
                $this->call('make:request');
                break;
            case Makeables::Seeder:
                $this->call('make:seeder');
                break;
            case Makeables::View:
                $this->call('make:view');
                break;
            case Makeables::Factory:
                $this->call('make:factory');
                break;
            case Makeables::Job:
                $this->call('make:job');
                break;
        }
    }

    /**
     * @throws NoBundlesDefined
     */
    private function getBundleToCreate(): string
    {
        $bundles = config('bundles.bundles');

        if (is_null($bundles))
        {
            throw new NoBundlesDefined();
        }

        return select(
            label: 'Select a Bundle to Create:',
            options: array_keys($bundles)
        );
    }
}
