package app

import (
	"fmt"
	"html/template"
	"net/http"
	"time"

	"github.com/gorilla/csrf"
	"github.com/gorilla/mux"
	"github.com/rs/xid"
)

type Server struct {
	ProductRepo ProductRepo
	Router      *mux.Router
	Env         map[string]string
}

func (s *Server) Routes() {
	// Define router, static files, and middleware
	s.Router.PathPrefix("/static/").Handler(http.StripPrefix("/static/", http.FileServer(http.Dir("static"))))
	// Routes to handle requests from browsers and HTML forms
	s.Router.HandleFunc("/", s.handleIndex()).Methods("GET")
	s.Router.HandleFunc("/contact", s.handleContact()).Methods("GET")
}

/**
 * HTTP handler for get requests to view the homepage
 */
func (s *Server) handleIndex() http.HandlerFunc {
	return func(w http.ResponseWriter, r *http.Request) {
		name := "index"
		title := "Home"

		// Handle 404 routes
		if r.URL.Path != "/" {
			w.WriteHeader(http.StatusNotFound)
			name = "404"
			title = "Uh oh"
		}

		products, err := s.ProductRepo.All()
		if err != nil {
			fmt.Println("Unable to get products")
		}

		s.getTemplate(name, nil).Execute(w, map[string]interface{}{
			"title":    title,
			"env":      s.Env,
			"products": products,
		})
	}
}

/**
 * HTTP handler for get requests to view the contact page
 */
func (s *Server) handleContact() http.HandlerFunc {
	return func(w http.ResponseWriter, r *http.Request) {
		name := "contact"
		title := "Contact"

		s.getTemplate(name, nil).Execute(w, map[string]interface{}{
			"title":          title,
			"env":            s.Env,
			csrf.TemplateTag: csrf.TemplateField(r),
		})
	}
}

/**
 * Helper function to load all required layouts and partials to load template
 */
func (s *Server) getTemplate(name string, fm template.FuncMap) *template.Template {
	funcMap := template.FuncMap{
		"now": func() int {
			return time.Now().Year()
		},
		"uniqueID": func() string {
			return xid.New().String()
		},
	}
	// Merge custom funcMap
	for k, v := range fm {
		funcMap[k] = v
	}

	t, err := template.New("main.html").Funcs(funcMap).ParseFiles(
		"templates/_layouts/main.html",
		"templates/_meta/data.html",
		"templates/_meta/favicons.html",
		fmt.Sprintf("templates/%s.html", name),
	)
	if err != nil {
		fmt.Printf("Unable to load template %s: \n", name, err)
	}

	return t
}
