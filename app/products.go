package app

import "fmt"

type ProductRepo interface {
	All() ([]*product, error)
}

func NewProductRepo() (ProductRepo, error) {
	return productStore{}, nil
}

type image struct {
	URL   string
	Title string
}

type product struct {
	Name        string
	Description string
	Thumbs      []image
	URL         string
}

type productStore struct{}

func (r productStore) All() ([]*product, error) {
	var ps []*product

	for i := 1; i < 4; i++ {
		thumbs := []image{
			{"/static/images/products/1a.jpg", "Product 1a"},
			{"/static/images/products/1b.jpg", "Product 1b"},
			{"/static/images/products/1c.jpg", "Product 1c"},
			{"/static/images/products/1d.jpg", "Product 1d"},
		}
		p := &product{
			fmt.Sprintf("Product %d", i),
			"Short Description of product",
			thumbs,
			fmt.Sprintf("/products/%d", i),
		}
		ps = append(ps, p)
	}

	return ps, nil
}
