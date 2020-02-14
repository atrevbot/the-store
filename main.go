package main

import (
	"log"
	"net/http"

	"github.com/atrevbot/the-store/app"
	"github.com/gorilla/csrf"
	"github.com/gorilla/mux"
	"github.com/joho/godotenv"
)

func main() {
	// Load env file
	env, err := godotenv.Read()
	if err != nil {
		panic(err)
	}

	productRepo, err := app.NewProductRepo()
	if err != nil {
		panic(err)
	}

	// Create server and attach routes
	s := app.Server{productRepo, mux.NewRouter(), env}
	s.Routes()

	// Start server
	secret := []byte(env["SECRET_KEY"])
	secure := csrf.Secure(env["ENVIRONMENT"] != "development")
	log.Fatal(http.ListenAndServe(":8080", csrf.Protect(secret, secure)(s.Router)))
}
