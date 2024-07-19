<?php

namespace ConnorLock05\LaravelBundles\Data;

enum Makeables
{
    case Model;
    case Migration;
    case Controller;
    case ResourceController;
    case Command;
    case Event;
    case Listener;
    case Mail;
    case Notification;
    case Policy;
    case Request;
    case Seeder;
    case View;
    case Factory;
    case Job;
}
