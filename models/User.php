<?php

namespace models;

class User extends Model
{
    public int $userId;
    public string $lastName;
    public string $firstName;
    public string $userAdress;
    public string $userTel;
    public string $userEmail;
    private string $userPassword;
    private string $userPic;
    private bool $userIsActive;
    private string $userSignupDate;
    private string $userLastModifyDate;
    private string $userRole;
    private string $userCity;
    private string $userZip;
    private string $userLat;
    private string $userLon;

    // Getter and Setter for userPassword
    public function getUserPassword(): string
    {
        return $this->userPassword;
    }

    public function setUserPassword(string $userPassword): void
    {
        $this->userPassword = $userPassword;
    }

    // Getter and Setter for userPic
    public function getUserPic(): string
    {
        return $this->userPic;
    }

    public function setUserPic(string $userPic): void
    {
        $this->userPic = $userPic;
    }

    // Getter and Setter for userIsActive
    public function isUserIsActive(): bool
    {
        return $this->userIsActive;
    }

    public function setUserIsActive(bool $userIsActive): void
    {
        $this->userIsActive = $userIsActive;
    }

    // Getter and Setter for userSignupDate
    public function getUserSignupDate(): string
    {
        return $this->userSignupDate;
    }

    public function setUserSignupDate(string $userSignupDate): void
    {
        $this->userSignupDate = $userSignupDate;
    }
    // Getter and Setter for userLastModifyDate
    public function getUserLastModifyDate(): string
    {
        return $this->userLastModifyDate;
    }

    public function setUserLastModifyDate(string $userLastModifyDate): void
    {
        $this->userLastModifyDate = $userLastModifyDate;
    }

    // Getter and Setter for userRole
    public function getUserRole(): string
    {
        return $this->userRole;
    }

    public function setUserRole(string $userRole): void
    {
        $this->userRole = $userRole;
    }

    // Getter and Setter for userCity
    public function getUserCity(): string
    {
        return $this->userCity;
    }

    public function setUserCity(string $userCity): void
    {
        $this->userCity = $userCity;
    }

    // Getter and Setter for userZip
    public function getUserZip(): string
    {
        return $this->userZip;
    }

    public function setUserZip(string $userZip): void
    {
        $this->userZip = $userZip;
    }

    // Getter and Setter for userLat
    public function getUserLat(): string
    {
        return $this->userLat;
    }

    public function setUserLat(string $userLat): void
    {
        $this->userLat = $userLat;
    }

    // Getter and Setter for userLon
    public function getUserLon(): string
    {
        return $this->userLon;
    }

    public function setUserLon(string $userLon): void
    {
        $this->userLon = $userLon;
    }
}
