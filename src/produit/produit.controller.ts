import { Controller, Get, Post, Body, Patch, Param, Delete, Res } from '@nestjs/common';
import { ProduitService } from './produit.service';
import { CreateProduitDto } from './dto/create-produit.dto';
import { UpdateProduitDto } from './dto/update-produit.dto';
import { UploadedFile, UseInterceptors } from '@nestjs/common';
import { FileInterceptor } from '@nestjs/platform-express';
import { diskStorage } from 'multer';

@Controller('produits')
export class ProduitController {
  constructor(private readonly produitService: ProduitService) {}

  // @Post()
  // create(@Body() createProduitDto: CreateProduitDto) {
  //   return this.produitService.create(createProduitDto);
  // }

  @Get()
  findAll() {
    return this.produitService.findAll();
  }
  @Get('list/:categorie')
  findAllParCategorie(@Param('categorie') categorie: string) {
    return this.produitService.findAllParCategorie(categorie);
  }

  @Post()
  @UseInterceptors(
    FileInterceptor('image', {
    storage: diskStorage({
   destination: './uploads/produits',
   filename: (req, file, cb) => {
     //chance file name :
     cb(null, 'prod_'+  Date.now() 
     +'.'+ file.originalname.split('.').pop())
   }
 })
}))
   create(@UploadedFile() file: any, @Body() product: CreateProduitDto, ) {
    product.image = file.filename;
    console.log({aa: product})
    return this.produitService.create(product);
  }
  
  
  @Get(':id')
  findOne(@Param('id') id: string) {
    return this.produitService.findOne(id);
  }

  @Patch(':id')
  update(@Param('id') id: string, @Body() updateProduitDto: UpdateProduitDto) {
    return this.produitService.update(id, updateProduitDto);
  }

  @Delete(':id')
  remove(@Param('id') id: string) {
    return this.produitService.remove(id);
  }
  @Get('uploads/:file')
  display(@Param('file') file, @Res() res ){
      res.sendFile(file,{ root: './uploads/produits' })
  }
}

