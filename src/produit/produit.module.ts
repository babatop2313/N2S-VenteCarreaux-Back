import { Module } from '@nestjs/common';
import { ProduitService } from './produit.service';
import { ProduitController } from './produit.controller';
import { MongooseModule } from '@nestjs/mongoose';
import { produitSchema } from './produit.schema';
import { produitModelName } from './produit.model-name';

@Module({
  imports:[MongooseModule.forFeature([{schema: produitSchema, name: produitModelName}])],
  controllers: [ProduitController],
  providers: [ProduitService]
})
export class ProduitModule {}
